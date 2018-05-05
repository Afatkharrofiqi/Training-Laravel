@extends('layout') @section('title', 'Todo List') @section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bordered Table</h3>
    </div>
    <div class="box-body">
        @if(!empty(Session('message')))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session('message')}}
        </div>
        @else @endif
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Create At</th>
                <th width="135">Action</th>
            </tr>
            @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->description }}</td>
                <td>{{ $todo->created_at }}</td>
                <td>
                    {{ link_to('todo/'.$todo->id.'/edit','Edit',['class'=>'btn btn-info']) }} 
                    {{ Form::open(['url'=>'todo/'.$todo->id.'','method'=>'delete','style'=>'float:right',"onclick"=>"return confirm('Are you sure you want to delete this Todo')"]) }} 
                    {{ Form::submit('Delete',['class'=>'btn btn-success']) }} 
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </table>
        <hr>
        <a href="/todo/create" class="btn btn-danger btn-sm">Create New Todo</a>
    </div>
</div>
@endsection()