@extends('welcome')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Список задач:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}">Добавить задачу</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table
                         table-hover
                         table-borderless
                         align-middle col-lg-12">
        <tr>
            <th>Статус задачи:</th>
            <th>Описание:</th>
            <th>Админ</th>
            <th>Исполнитель:</th>
            <th>Отчет:</th>
            <th>Рейтинг:</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->status }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->admin_id }}</td>
                <td>{{ $task->user_id }}</td>
                <td>{{ $task->answer }}</td>
                <td>{{ $task->rating }}</td>
                <td>
                    <div class="btn-group" role="group">
                    <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Показать</a>
                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Изменить</a>
                    </div>
                </td>
                <td>
                    <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>{{ $tasks->links('pagination::bootstrap-5') }}</div>
@endsection
