@extends('welcome')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавление в таблицу {{$data['table']}}</h2>
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

    <form action="{{ route('table.save', ['table' => $data['table']])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        @foreach($data['columns'] as $value)
            @if($value != 'id')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{$value}}:</strong>
                    <input type="text" name="{{$value}}" value="" class="form-control" placeholder="Заполните поле">
                </div>
            </div>
            @endif
        @endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>
@endsection
