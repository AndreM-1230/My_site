@extends('welcome')

@section('content')
    <table class='table table-striped' data-tblname='tbl' style='text-align:center;'>
        <tbody>
        <tr>
            @foreach($data['tables'] as $value)
                <th>
                    <a href="{{ route('table.index', ['table' => $value->Tables_in_corp_site_tables])}}" >{{$value->Tables_in_corp_site_tables}}</a>
                </th>
            @endforeach
        </tr>
        </tbody>
    </table>
    <table class='table table-striped col-12' data-tblname='tbl' style='text-align:center;'>
        <tbody>
        <tr>
            @foreach($data['columns'] as $value)
                <td>
                    <a >{{$value}}</a>
                </td>
            @endforeach
            <td colspan="2">
                <p>Действия</p>
            </td>
        </tr>
        <tr>
            <form >
            @foreach($data['columns'] as $value)
                <td>
                    <label>
                        <input type="text" class='form-control' name="{{$value}}" value="">
                    </label>
                </td>
            @endforeach
                <td>
                    <button type="submit" style="width: 100%" class="btn btn-info">Поиск</button>
                </td>
            </form>
            <td>
                <a class="btn btn-success" href="{{ route('table.create',$data['table']) }}">Добавить</a>
            </td>
        </tr>
        @foreach($data['data'] as $string)
        <tr>
            @foreach($string as $value)
                <td>{{$value}}</td>
            @endforeach
            <td>
                <div class="btn-group" role="group">
                    <a class="btn btn-outline-info" href="{{ route('table.show', ['table' => $data['table'], 'id' => $string->id]) }}">Показать</a>
                    <a class="btn btn-outline-primary" href="{{ route('table.edit', ['table' => $data['table'], 'id' => $string->id]) }}">Изменить</a>
                </div>
            </td>
            <td>
                <form action="{{ route('table.destroy', ['table' => $data['table'], 'id' => $string->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
