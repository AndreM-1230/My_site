@extends('welcome')

@section('content')
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Создать таблицу</h1>
            </div>
        </div>
    </div>
    <form
        method='post'
        action='./Createtableserv.php'
        id='idf'></form>
    <h3>Имя таблицы: <input name='tablename' form='idf' value=''/></h3>
    <h3>Поля таблицы:</h3>
    <table class='table table-striped' style='text-align:center;'><tbody>
        <tr id='#0'>
            <td>
                <h3>id</h3>
            </td>
            <td>
                <div class='btn-group' role='group' aria-label='Basic example'>
                    <button type='button' id='00' class='btn btn-outline-success' disabled>Вверх</button>
                    <button type='button' id='01' class='btn btn-outline-success' disabled>Вниз</button>
                    <button type='button' id='02' class='btn btn-outline-success' onclick='create_string(this)'>Добавить</button>
                </div>
            </td>
        </tr>
        </tbody></table>
    <div><input type='submit' name='tbl' form='idf' class='btn btn-lg btn-outline-success' value='Создать'  /></div>
@endsection
