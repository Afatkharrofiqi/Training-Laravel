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
                <table class="table table-bordered">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>                            
                    @foreach($list as $data)
                        <tr>
                            <td>{{$data['user']}}</td>
                            <td>{{$data['email']}}</td>
                            <td>{{$data['password']}}</td>
                        </tr>
                    @endforeach                            
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>	  				
    </div>        
</div>
@endsection()