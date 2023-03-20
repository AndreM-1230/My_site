@extends('welcome')

@section('content')

    <table class='table table-striped' data-tblname='tbl' style='text-align:center;'>
        <tbody>
        <tr>
            @foreach($tables as $value)
                <th>
                <a href="{{ route('table', ['table' => $value->Tables_in_corp_site_tables])}}" >{{$value->Tables_in_corp_site_tables}}</a>
                </th>
            @endforeach
        </tr>
        </tbody>
    </table>
@endsection
