<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $data = Proposal::where('nidn_dosen', Auth::user()->nidn)->get();
        
        return view("dosen.pages.home")->with('data', $data);
    }

    public function tambah() {
        return view("dosen.pages.tambah-proposal");
    }

    public function tambahAnggota() {
        return view("dosen.pages.tambah-anggota");
    }

    public function succes() {
        return view("dosen.pages.sukses");
    }

}
