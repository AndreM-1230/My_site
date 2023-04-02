@extends('welcome')

@section('content')
<div class="btn-group mr-2" style="margin: 0 auto; display: flex; justify-content: center;" role="group" aria-label="First group">
    @foreach($data['tables'] as $value)
        @if (Session::get('table') == $value->Tables_in_corp_site_tables)
            <a class="btn btn-info" href="{{ route('table.index', ['table' => $value->Tables_in_corp_site_tables])}}" >{{$value->Tables_in_corp_site_tables}}</a>
        @else
            <a class="btn btn-outline-info" href="{{ route('table.index', ['table' => $value->Tables_in_corp_site_tables])}}" >{{$value->Tables_in_corp_site_tables}}</a>
        @endif
    @endforeach
</div>
<div class="container" style="display: flex; justify-content: flex-end;">
    <div class="btn-toolbar mb-3 mt-3 ml-auto" role="toolbar" aria-label="Toolbar with button groups">
        <div class="input-group">
            <form action="{{route('table.search', $data['table'])}}" method="POST" id="idf">
              @csrf
              <input type="text" class="form-control" name="search" value="{{$data['search'] ?? ''}}" placeholder="Поиск" aria-label="Input group example" aria-describedby="btnGroupAddon">
            </form>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="submit" form="idf" style="width: 100%" class="btn btn-outline-info">
                <img class="bi d-block mx-auto mb-1" src="/icons/search.svg" width="20" height="20" alt="Иконка">
            </button>
            <a class="btn btn-outline-success" href="{{ route('table.create',['table' => $data['table']]) }}">Добавить</a>
        </div>
    </div>
</div>
<table class='table table-striped col-12' data-tblname='tbl' style='text-align:center;'>
    <tbody>
        <tr>
            @foreach($data['columns'] as $value)
                <td>
                    <a>{{$value}}</a>
                </td>
            @endforeach
            <td colspan="2">
                <p>Действия</p>
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
<div>{{ $data['data']->links('pagination::bootstrap-5') }}</div>
@endsection
