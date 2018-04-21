@extends('layout')
@section('title', 'Category')
@section('content')
<h2>Category</h2>
<ul>
@foreach($listCategory as $category)
    <li>{{ $category }}</li>
@endforeach
</ul>
{{ link_to('category/create', 'Create new Category')}}
@endsection()

