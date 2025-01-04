<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pengajarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pengajar = DB::table('pengajar')
        ->join('jurusan', 'jurusan.id', '=', 'pengajar.id_jurusan')
        ->select('pengajar.*','jurusan.nama AS jur')
        ->get();
        return view('pengajar.index',compact('ar_pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajar.c');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
            'nama'=>'required',
            'email'=>'required',
            'hp'=>'required',
            'alamat'=>'required',
            'id_jurusan'=>'required',
            ],
            //2. menampilkan pesan kesalahan
            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'nama.required'=>'Nama Wajib di Isi',
                'email.required'=>'E-mail Wajib di Isi',
                'hp.required'=>'No HP Wajib di Isi',
                'alamat.required'=>'Alamat Wajib di Isi',
                'id_jurusan.required'=>'ID jurusan Wajib di Isi',
            ],  
            );
             //proses input data tangkap request dari form buku
    DB::table('pengajar')->insert(
        [
            'nama'=>$request->nama,
            'email'=>$request->email,
            'hp'=>$request->hp,
            'alamat'=>$request->alamat,
            'id_jurusan'=>$request->id_jurusan,
        ]
        );
        //landing page
        return redirect()->route('pengajar.index')->with('success','Data pengajar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_pengajar = DB::table('pengajar')
        ->join('jurusan', 'jurusan.id', '=', 'pengajar.id_jurusan')
        ->select('pengajar.*','jurusan.nama AS jur')
        ->where('pengajar.id','=',$id)
        ->get();
        return view('pengajar.d',compact('ar_pengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('pengajar')
        ->where('id','=',$id)->get();
        return view('pengajar.e',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('pengajar')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'alamat'=>$request->alamat,
                'id_jurusan'=>$request->id_jurusan,
            ]
            );
            //landing page
            return redirect('/pengajar'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pengajar')->where('id',$id)->delete();
        return redirect('/pengajar');
    }
}
