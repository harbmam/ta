@extends('adminlte::page')
@section('title', 'Data Jurusan')
@section('content_header')
<h3> Data Jurusan</h3>
<br/>
<a href="{{ route('jurusan.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@php
$rs1 = App\Models\pengajar::all();
$rs2 = App\Models\jurusan::all();
@endphp
<form method="POST" action="{{ route('jurusan.store') }}" enctype="multipart/form-data">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

<div class="form-group">
<label>Nama Jurusan</label>
<input type="text" name="nama" class="form-control"/>
</div>

<div class="form-group">
<label>ID Pengajar</label>
<input type="text" name="pengajar_id" class="form-control"/>
</div>

<div class="form-group">
<label>Upload Foto</label>
<input type="file" name="foto" class="form-control"/>
</div>

<button type="submit" class="btn btn-primary"
name="proses">Simpan</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop