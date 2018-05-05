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
        <table id="users-table" class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Images</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th width="135">Action</th>
                </tr>
            </thead>            
        </table>
        <hr>        
        <a href="/todo/create" class="btn btn-danger btn-sm">Create New Todo</a>
    </div>
</div>
@endsection()


@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'todo/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image'},
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush