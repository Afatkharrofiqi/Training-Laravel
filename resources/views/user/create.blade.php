@extends('layout')
@section('title', 'Form User')
@section('content')
<h2>Form User</h2>
{{ Form::open(['url'=>'user'])}}
{{ Form::text('name',null,['placeholder'=>'Nama'])}}
<br/>
{{ Form::email('email',null,['placeholder'=>'Email'])}}
<br/>
{{ Form::password('password',['placeholder'=>'Password'])}}
<br/>
{{ Form::submit('Save User')}}
{{ link_to('/user','Back')}}
{{ Form::close()}}
@endsection