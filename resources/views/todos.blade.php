<table>
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
