<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class pelajarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pelajar = DB::table('pelajar')
        ->join('pengajar', 'pengajar.id', '=', 'pelajar.pengajar_id')
        ->join('jurusan', 'jurusan.id', '=', 'pelajar.jurusan_id')
        ->select('pelajar.*', 'pengajar.nama AS pen', 'jurusan.nama AS jur')
        ->get();
        return view('pelajar.index',compact('ar_pelajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelajar.c');
    }

    public function pelajarPDF()
    {
        $ar_pelajar = DB::table('pelajar')
        ->join('pengajar', 'pengajar.id', '=', 'pelajar.pengajar_id')
        ->join('jurusan', 'jurusan.id', '=', 'pelajar.jurusan_id')
        ->select('pelajar.*', 'pengajar.nama AS pen', 'jurusan.nama AS jur')
        ->get();
        $pdf = PDF::loadView('pelajar/pelajarPDF',['ar_pelajar'=>$ar_pelajar]);
        return $pdf->download('datapelajar.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
            'nama'=>'required',
            'pengajar_id'=>'required',
            'jurusan_id'=>'required',
            ],
            //2. menampilkan pesan kesalahan
            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'nama.required'=>'Nama Wajib di Isi',
                'pengajar_id.required'=>'Pengajar Wajib pilih',
                'jurusan_id.required'=>'Wajib pilih Jurusan',
            ],  
            );
             //proses input data tangkap request dari form buku
    DB::table('pelajar')->insert(
        [
            'nama'=>$request->nama,
            'pengajar_id'=>$request->pengajar_id,
            'jurusan_id'=>$request->jurusan_id,
        ]
        );
        //landing page
        return redirect()->route('pelajar.index')->with('success','Data Pelajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_pelajar = DB::table('pelajar')
        ->join('pengajar', 'pengajar.id', '=', 'pelajar.pengajar_id')
        ->join('jurusan', 'jurusan.id', '=', 'pelajar.jurusan_id')
        ->select('pelajar.*', 'pengajar.nama AS pen', 'jurusan.nama AS jur')
        ->where('pelajar.id','=',$id)
        ->get();
        return view('pelajar.d',compact('ar_pelajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('pelajar')
        ->where('id','=',$id)->get();
        return view('pelajar.e',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('pelajar')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'pengajar_id'=>$request->pengajar_id,
                'jurusan_id'=>$request->jurusan_id,
            ]
            );
            //landing page
            return redirect('/pelajar'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pelajar')->where('id',$id)->delete();
        return redirect('/pelajar');
    }
}
