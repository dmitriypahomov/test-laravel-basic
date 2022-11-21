@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Todos</h1>
            <table class="table table-striped">
                <tr>
                    <th>User ID:</th>
                    <th>ID:</th>
                    <th>Title:</th>
                    <th>Completed</th>
                </tr>
                @foreach ($todos as $todo)
                <tr>
                    <td>{{$todo['userId']}}</td>
                    <td>{{$todo['id']}}</td>
                    <td>{{$todo['title']}}</td>
                    <td>{{$todo['completed']}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
