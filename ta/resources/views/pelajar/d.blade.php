@extends('adminlte::page')
@section('title', 'Data Pelajar')
@section('content_header')
    <h3 class="fa fa-graduation-cap"> Data Pelajar</h3>
    <br /><br>
    <a href="{{ route('pelajar.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left">
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
    @foreach ($ar_pelajar as $b)
        <form method="POST" action="{{ route('pelajar.store') }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $b->nama }}" disabled />
            </div>

            <div class="form-group">
                <label>Pengajar</label>
                <select class="form-control" name="pengajar_id" disabled>
                    <option value="">-- Pilih Pengajar --</option>
                    @foreach ($rs1 as $p)
                        @php
                            $sel1 = $p->id == $b->pengajar_id ? 'selected' : '';
                        @endphp
                        <option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" name="jurusan_id" disabled>
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($rs2 as $j)
                        @php
                            $sel2 = $j->id == $b->jurusan_id ? 'selected' : '';
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
