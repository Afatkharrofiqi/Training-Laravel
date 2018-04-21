@extends('layout')
@section('title', 'Form Category')
@section('content')
<h2>Form Category</h2>
{{ Form::open(['url'=>'category']) }}
{{ Form::text('category',null,['placeholder'=>'Category Name'])}}
<br/>
{{ Form::submit('Save Category') }}
{{ link_to('/todo','Back')}}
{{ Form::close()}}
@endsection()