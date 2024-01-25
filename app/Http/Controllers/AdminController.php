<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Proposal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Proposal::all();
        return view("admin.pages.dahsboard")->with('data', $data);
    }

    public function details($id) {
        $proposal = Proposal::find($id);
        return view("admin.pages.detail-proposal", compact('proposal', 'id'));
    }


    public function searchPeninjau(Request $request)
    {
        // Implement your data retrieval logic here based on the search query
        // For example, assuming you have a 'items' table in the database
        if($request->input('search') != "" || $request->input('search') != null) {
            $items = Dosen::where('nama', 'like', '%' . $request->input('search') . '%')->where("role", "peninjau")->get();
        } else {
            $items = Dosen::where("role", "peninjau")->get();
        }

        $view = view("includes.search_result", compact('items'))->render();

        return response()->json(['html' => $view]);
    }
    public function getProposalByYear(Request $request)
    {
        // Implement your data retrieval logic here based on the search query
        // For example, assuming you have a 'items' table in the database

        $data = Proposal::whereYear("tanggal", "=",  $request->input('tahun'))->get();
        $view = view("includes.propoal_by_year", compact('data'))->render();

        return response()->json(['html' => $view]);
    }


    public function tambahPeninjau(Request $request, $id) {
        $request->validate([
            "peninjau" => "required"
        ]);

        Proposal::where('id', $id)->update([
            "nidn_peninjau" => $request->peninjau
        ]);

        return back();
    }





}
