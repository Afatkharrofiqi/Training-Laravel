@extends('layout')
@section('title', 'List Makanan')
@section('content')
<h2>Daftar Makanan</h2>
<ul>
@foreach($daftarMakanan as $makanan)
    <li>{{ $makanan }}</li>
@endforeach
</ul>
@endsection()