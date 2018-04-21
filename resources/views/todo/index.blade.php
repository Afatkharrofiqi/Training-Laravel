@extends('layout')
@section('title', 'Todo List')
@section('content')
<h2>List Todo</h2>
<ul>
@foreach($todos as $d)
    <li> {{ $d }} </li>
@endforeach
</ul>

<a href="/todo/create">Create New Todo</a>
@endsection()