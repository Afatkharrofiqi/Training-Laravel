<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
    </tr>
    @foreach($todos as $todo)
    <tr>
        <td>{{$todo->title}}</td>
        <td>{{$todo->description}}</td>
        <td>{{$todo->category->name}}</td>
    </tr>
    @endforeach
</table>