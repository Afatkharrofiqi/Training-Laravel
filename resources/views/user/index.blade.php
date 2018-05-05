@extends('layout') 
@section('title', 'Daftar User') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Pengguna</h3>
                <div style="float:right">
                    <div class="box">
                        <a href="user/create" class="btn btn-info btn-sm">Create New User</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                @if(!empty(Session('message')))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ Session('message')}}
                </div>
                @else @endif
                <table class="table table-bordered">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>
                            {{ link_to('user/'.$user->id.'/edit','Edit',['class'=>'btn btn-info'])}}
                            {{ Form::open(['url'=>'user/'.$user->id.'',
                                'method'=>'delete',
                                'style'=>'float:right',
                                'onclick'=>"return confirm('Apakah anda yakin ingin menghapus user $user->name ')"
                                ]) }}
                            {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li>
                        <a href="#">«</a>
                    </li>
                    <li>
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection()