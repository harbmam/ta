@extends('adminlte::page')
@section('title', 'Data Pengajar')
@section('content_header')
    <h3 class="fa fa-address-card"> Data Pengajar</h3>
    <br  disabled/><br>
    <a href="{{ route('pengajar.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left">
            Back</i></a>
@stop
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @php
        $rs1 = App\Models\pengajar::all();
        $rs2 = App\Models\jurusan::all();
    @endphp
    @foreach ($ar_pengajar as $b)
        <form method="POST" action="{{ route('pengajar.store') }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $b->nama }}" disabled/>
                </div>
                
                <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $b->email }}" disabled/>
                </div>
                
                <div class="form-group">
                <label>HP</label>
                <input type="text" name="hp" class="form-control" value="{{ $b->hp }}" disabled/>
                </div>
                
                <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $b->alamat }}" disabled/>
                </div>
                
                <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="id_jurusan" disabled>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($rs2 as $j)
                            @php
                                $sel2 = $j->id == $b->id_jurusan ? 'selected' : '';
                            @endphp
                            <option value="{{ $j->id }}" {{ $sel2 }}>{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>
    @endforeach
@stop
@section('css')
    <link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi');
    </script>
@stop
