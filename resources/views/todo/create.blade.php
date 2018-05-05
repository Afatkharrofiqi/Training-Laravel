@extends('layout')
@section('title', 'Form Todo')
@section('content')
<h2>Form Todo</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(['url' => 'todo']) }} 
@include('todo.form')
{{ Form::submit('Save Todo') }}
{{ link_to('/todo','Back') }}
{{ Form::close() }}
@endsection()