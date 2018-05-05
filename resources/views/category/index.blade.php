@extends('layout')
@section('title', 'Category')
@section('content')
<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>                    
                    <th>Create At</th>
                </tr>
                @foreach($listCategory as $cat)
                <tr>                    
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->created_at }}</td>
                </tr>
                @endforeach
            </table>
            <hr>
            <a href="/category/create" class="btn btn-danger btn-sm">Create New Category</a>
        </div>
    </div>
@endsection()

