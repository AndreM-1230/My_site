<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Integration\Database\Post;
use getallheaders\Tests\GetAllHeadersTest;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class SiteTablesController extends Controller
{


    public function index(Request $request)
    {
        $data['tables'] = Schema::connection('mysql2')->getAllTables();
        if ($request->table) {
            Session::put('table', $request->table);
            $data['table'] = Session::get('table');
        } elseif (Session::get('table')) {
            $data['table'] = Session::get('table');
        } else {
            Session::put('table', $data['tables'][0]->Tables_in_corp_site_tables);
            $data['table'] = Session::get('table');
        }
        $data['data'] = DB::connection('mysql2')->table($data['table'])->orderByDesc('id')->paginate(20);
        $data['columns'] = array_column(DB::connection('mysql2')->select('SHOW COLUMNS FROM ' . $data['table']), 'Field');
        $key = array_search('id', $data['columns']);
        if ($key !== false) {
            array_unshift($data['columns'], $data['columns'][$key]);
            unset($data['columns'][$key + 1]);
        }
        return view('info_data.table', compact('data'));
    }

    public function show(Request $request)
    {   
        $data['id'] = $request->id;
        $data['table'] = $request->table;
        $data['data'] = DB::connection('mysql2')->select("SELECT * FROM ". $data['table'] . " WHERE id = '{$data['id']}' LIMIT 1");
        return view('info_data.show', compact('data'));
    }

    public function TablesCreate(Request $request)
    {
        $table_name = $request->table_name;
        Schema::connection('mysql2')->create($table_name, function (Blueprint $table){

        });
    }

    public function destroy(Request $request)
    {
        DB::connection('mysql2')->table($request->table)->where('id', $request->id)->delete();
        return redirect()->route('table.index');
    }

    public function edit(Request $request)
    {
        $data['id'] = $request->id;
        $data['table'] = $request->table;
        $data['data'] = DB::connection('mysql2')->select("SELECT * FROM ". $data['table'] . " WHERE id = '{$data['id']}' LIMIT 1");
        return view('info_data.edit', compact('data'));
    }

    public function update(Request $request)
    {   
        $id = $request->id;
        $data['table'] = $request->table;
        $string = $request->except('_token', '_method', 'table', 'id');
        DB::connection('mysql2')->table($data['table'])->where('id', $id)->update($string);
        return redirect()->route('table.index', [$data['table']]);
    }

    public function search(Request $request)
    {
        $data['table'] = $request->table;
        $data['search'] = $request->search;
        $data['tables'] = Schema::connection('mysql2')->getAllTables();
        $data['columns'] = array_column(DB::connection('mysql2')->select('SHOW COLUMNS FROM ' . $data['table']), 'Field');
        $key = array_search('id', $data['columns']);
        if ($key !== false) {
            array_unshift($data['columns'], $data['columns'][$key]);
            unset($data['columns'][$key + 1]);
        }
        $query = DB::connection('mysql2')->table($data['table']);
        foreach ($data['columns'] as $column) {
            $query->orWhere($column, 'LIKE', '%' . $data['search'] . '%');
        }
        $data['data'] = $query->orderBy('id', 'desc')->paginate(20);
        return view('info_data.table', compact('data'));
    }

    public function create(Request $request)
    {
        $data['table'] = $request->table;
        $data['columns'] = DB::connection('mysql2')->getSchemaBuilder()->getColumnListing($data['table']);
        return view('info_data.create', compact('data'));
    }

    public function save(Request $request)
    {
        $data['table'] = $request->table;
        $string = $request->except('_token', '_method', 'table');
        DB::connection('mysql2')->table($data['table'])->insert($string);
        return redirect()->route('table.index', [$data['table']]);
    }
}
