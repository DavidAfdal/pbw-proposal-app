<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeninjauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarProposal = Proposal::where('nidn_peninjau', Auth::user()->nidn)->get();
        return view("reviewer.pages.tinajuan")->with("data", $daftarProposal);

    }

    public function details($id) {
        $proposal = Proposal::find($id);
        return view("reviewer.pages.detail-tinjaun", compact('proposal','id'));
    }

    public function TambahComment(Request $request, $id) {

        $request->validate([
           "review" => 'required'
        ]);

        Proposal::where('id', $id)->update([
            "status" => $request->status
        ]);

        Comment::create([
            "review" => $request->review,
            "nidn_dosen" => Auth::user()->nidn,
            "id_proposal"=> $id,
        ]);

        return back();
    }

}
