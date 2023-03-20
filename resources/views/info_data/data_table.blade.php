@extends('welcome')

@section('content')
    <table class='table table-striped' data-tblname='tbl' style='text-align:center;'>
        <tbody>
        <tr>
            {{var_dump($data)}}
            @foreach($data as $value)
                <th>
                    <a >{{var_dump($value)}}</a>
                </th>
            @endforeach
        </tr>
        </tbody>
    </table>
@endsection
