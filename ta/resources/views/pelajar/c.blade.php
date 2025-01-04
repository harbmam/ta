@extends('adminlte::page')
@section('title', 'Data Pelajar')
@section('content_header')
<h3> Data Pelajar</h3>
<br/>
<a href="{{ route('pelajar.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
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
<form method="POST" action="{{ route('pelajar.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control"/>
</div>

<div class="form-group">
<label>Pengajar</label>
<select class="form-control" name="pengajar_id">
<option value="">-- Pilih Pengajar --</option>
@foreach($rs1 as $p)
<option value="{{ $p->id }}">{{ $p->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Jurusan</label>
<select class="form-control" name="jurusan_id">
<option value="">-- Pilih Jurusan --</option>
@foreach($rs2 as $j)
<option value="{{ $j->id }}">{{ $j->nama }}</option>
@endforeach
</select>
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