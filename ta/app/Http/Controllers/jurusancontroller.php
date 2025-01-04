<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;

class jurusancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_jurusan = DB::table('jurusan')
        ->join('pengajar','pengajar.id','=','jurusan.pengajar_id')
        ->select('jurusan.*','pengajar.nama AS pen')
        ->get();
        return view('jurusan.index',compact('ar_jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.c');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->foto)){
            $request->validate([
            'foto' => 'image|mimes:jpg,jpeg,png,giff|max:20480',
            ]);
            $filename = $request->nama.'.'.$request->foto->extension();
            $request->foto
            ->move(public_path('gambar'), $filename);
            }else{
            $filename = '';
            }

        $validasi = $request->validate(
            [
            'nama'=>'required',
            'pengajar_id'=>'required'
            ],
            //2. menampilkan pesan kesalahan
            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'nama.required'=>'Nama Wajib di Isi',
                'pengajar_id.required'=>'ID Pengajar Wajib di Isi'
            ],  
            );
             //proses input data tangkap request dari form buku
    DB::table('jurusan')->insert(
        [
            'nama'=>$request->nama,
            'pengajar_id'=>$request->pengajar_id,
            'foto'=>$request->foto,
        ]
        );
        //landing page
        return redirect()->route('jurusan.index')->with('success','Data jurusan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_jurusan = DB::table('jurusan')
        ->join('pengajar','pengajar.id','=','jurusan.pengajar_id')
        ->select('jurusan.*','pengajar.nama AS pen')
        ->get();
        return view('jurusan.index',compact('ar_jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('jurusan')
        ->where('id','=',$id)->get();
        return view('jurusan.e',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses upload,dicek ketika edit data ada upload file/tidak
        if(!empty($request->foto)){
        //ambil isi kolom foto lalu hapus file fotonya di folder images
        $foto = DB::table('jurusan')->select('foto')
        ->where('id','=',$id)->get();
        foreach($foto as $f){
        $namaFile = $f->foto;
        }
        File::delete(public_path('gambar/'.$namaFile));
        //proses upload file baru
        $request->validate([
        'foto' => 'image|mimes:jpg,jpeg,png,giff|max:2048',
        ]);
        $fileName = $request->nama.'.'.$request->foto->extension();
        //$fileName = $request->nama.'.jpg';
        $request->foto->move(public_path('gambar'), $fileName);
        }
        else{
            //ambil isi kolom foto lalu hapus file fotonya di folder images
            $foto = DB::table('jurusan')->select('foto')
            ->where('id','=',$id)->get();
            foreach($foto as $f){
            $namaFile = $f->foto;
            }
            $fileName = $namaFile;
            }
            


        DB::table('jurusan')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'pengajar_id'=>$request->pengajar_id,
                'foto'=>$request->foto,
            ]
            );
            //landing page
            return redirect('/jurusan'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foto = DB::table('jurusan')->select('foto')
        ->where('id','=',$id)->get();
        foreach($foto as $f){
        $namaFile = $f->foto;
        }
        File::delete(public_path('gambar    /'.$namaFile));

        DB::table('jurusan')->where('id',$id)->delete();
        return redirect('/jurusan');
    }
}
