@extends('adminlte::page')
@section('title', 'Data Jurusan')
@section('content_header')
<h1 class="fa fa-book">Data Jurusan</h1>
<br>
@stop
@section('content') {{-- Isi Konten Data jurusan --}}
@php
$ar_judul = ['No','Nama','Pengajar','Sampul','Action'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('jurusan.create') }}"><i class="fa fa-plus"></i></a>
<br><br>
<div class="card">
    <div class="card-body">
<table class="table table-bordered table-striped" id="example1">
<thead>
<tr>
@foreach($ar_judul as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead>
<tbody>
    @foreach($ar_jurusan as $pel)
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $pel->nama }}</td>
    <td>{{ $pel->pen }}</td>
    <td width="20%" align="center">
        @php
        if(!empty($pel->foto)){
        @endphp
        <img src="{{ asset('gambar')}}/{{ $pel->foto }}" width="80%" />
        @php
        }else{
        @endphp
        <img src="{{ asset('gambar')}}/nophoto.png" width="80%" />
        @php
        }
        @endphp
        </td>
    <td align="right">
        <form method="POST" action="{{ route('jurusan.destroy', $pel->id) }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
            @method('delete') {{-- method delete digunakan untuk menghapus data --}}
            <a href="{{ route('jurusan.edit', $pel->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
            <button onclick="return confirm('Anda Yakin Data Dihapus?')" class="btn btn-danger"><i class="fa fa-trash"></i>
            </button>
        </form>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
</div>
    @stop

    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop 

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script> console.log('Hi!');</script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>
      @stop
      @section('footer')
              <div class="float-right d-none d-sm-block">
                  <b>@</b> Terserah lu lol
              </div>
              <strong>&copy; {{ date('Y') }} <a href="#">Software Development</a>.</strong> All rights reserved.
      @stop  