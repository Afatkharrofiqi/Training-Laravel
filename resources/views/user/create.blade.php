@extends('layout')
@section('title', 'Form User')
@section('content')
<h2>Form User</h2>
{{ Form::open(['url'=>'user'])}}
@include('user.form')
{{ Form::submit('Save User')}}
{{ link_to('/user','Back')}}
{{ Form::close()}}
@endsection