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


    public function tambahPeninjau(Request $request, $id) {
        $request->validate([
            "peninjau" => "required"
        ]);

        Proposal::where('id', $id)->update([
            "nidn_peninjau" => $request->peninjau
        ]);

        return back();
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
    public function destroy($id)
    {
        //
    }
}
