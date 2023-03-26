@extends('welcome')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Таблица: {{$data['table']}} - {{$data['id']}}</h2>
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
    <div class="row">
    @foreach($data['data'][0] as $key => $value)
        @if($key != 'id')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{$key}}:</strong>
                {{ $value }}
            </div>
        </div>
        @endif
    @endforeach
    </div>
@endsection
