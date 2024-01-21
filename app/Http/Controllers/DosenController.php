<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{

    public function home()
    {

        $data = Proposal::where('nidn_dosen', Auth::user()->nidn)->get();
        return view("dosen.pages.home")->with('data', $data);
    }

    public function tambah() {
        return view("dosen.pages.tambah-proposal");
    }

    public function tambahAnggota($id) {
        return view("dosen.pages.tambah-anggota", compact("id"));
    }

    public function succes() {
        return view("dosen.pages.sukses");
    }

    public function details($id) {
        $data = Proposal::find($id);
        return view("dosen.pages.details")->with('proposal', $data);
    }



}
