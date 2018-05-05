@extends('layout')
@section('title','Edit Todo')
@section('content')
<h2>Form Todo</h2>
@include('share.validation_error')
{{ Form::model($todo,['url' => 'todo/'.$todo->id.'','method'=>'put']) }} 
@include('todo.form')
{{ Form::submit('Save Todo') }}
{{ link_to('/todo','Back') }}
{{ Form::close() }}
@endsection
