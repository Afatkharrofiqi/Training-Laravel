@extends('layout') @section('title', 'Category') @section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bordered Table</h3>
    </div>
    <div class="box-body">
        <table id="users-table" class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            {{-- @foreach($listCategory as $cat)
            <tr>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->created_at }}</td>
            </tr>
            @endforeach --}}
        </table>
        <hr>
        <a href="/category/create" class="btn btn-danger btn-sm">Create New Category</a>
    </div>
</div>
@endsection() 
@push('scripts')
<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'category/json',
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
@endpush