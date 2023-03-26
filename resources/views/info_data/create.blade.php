@extends('welcome')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактирование таблицы {{$data['table']}} - {{$data['id']}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('table.index', ['table' => $data['table']]) }}"> Вернуться к таблице</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('table.create', ['table' => $data['table'],'id' => $data['id']]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        @foreach($data['data'][0] as $key => $value)
            @if($key != 'id')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{$key}}:</strong>
                    <input type="text" name="{{$key}}" value="{{$value}}" class="form-control" placeholder="Заполните поле">
                </div>
            </div>
            @endif
        @endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
