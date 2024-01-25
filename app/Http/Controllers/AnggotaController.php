<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDosen;
use App\Models\AnggotaMahasiswa;
use App\Models\Mitra;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

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
