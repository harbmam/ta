@extends('adminlte::page')
@section('title', 'Data Pengajar')
@section('content_header')
<h3> Data Pengajar</h3>
<br/>
<a href="{{ route('pengajar.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')
@php
$rs1 = App\Models\pengajar::all();
$rs2 = App\Models\jurusan::all();
@endphp
@foreach($data AS $b) 
<form method="POST" action="{{ route('pengajar.update',$b->id) }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
@method('put') 

<div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ $b->nama }}"/>
    </div>
    
    <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ $b->email }}"/>
    </div>
    
    <div class="form-group">
    <label>HP</label>
    <input type="text" name="hp" class="form-control" value="{{ $b->hp }}"/>
    </div>
    
    <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="{{ $b->alamat }}"/>
    </div>
    
    <div class="form-group">
        <label>Jurusan</label>
        <select class="form-control" name="id_jurusan">
            <option value="">-- Pilih Jurusan --</option>
            @foreach ($rs2 as $j)
                @php
                    $sel2 = $j->id == $b->id_jurusan ? 'selected' : '';
                @endphp
                <option value="{{ $j->id }}" {{ $sel2 }}>{{ $j->nama }}</option>
            @endforeach
        </select>
    </div>
    

<button type="submit" class="btn btn-primary"
name="proses">Simpan</button>
<button type="reset" class="btn btn-warning"
name="unproses">Batal</button>
@endforeach
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop