<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDosen;
use App\Models\AnggotaMahasiswa;
use App\Models\Mitra;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function TambahAnggotaDosen(Request $request, $id)
    {
        //
        $request->validate([
            "nama" => "required",
            "nidn" => "required",
        ]);

       AnggotaDosen::create([
            "nama" => $request->nama,
            "nidn" => $request->nidn,
            "id_proposal" => $id,
        ]);

        return back()->with("message", "Sukses Tambah Anggota Dosen");
    }

    public function TambahAnggotaMahasiswa(Request $request, $id)
    {
        //
        $request->validate([
            "nama" => "required",
            "npm" => "required",
        ]);

       AnggotaMahasiswa::create([
            "nama" => $request->nama,
            "npm" => $request->npm,
            "id_proposal" => $id,
        ]);

        return back()->with("message", "Sukses Tambah Anggota Mahasiswa");
    }

    public function TambahMitra(Request $request, $id)
    {
        //
        $request->validate([
            "nama" => "required",
            "pemimpin" => "required",
        ]);

       Mitra::create([
            "nama" => $request->nama,
            "pemimpin" => $request->pemimpin,
            "id_proposal" => $id,
        ]);

        return back()->with("message", "Sukses Tambah Mitra");
    }
}
