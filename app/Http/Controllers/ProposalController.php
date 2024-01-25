<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleTambahProposal(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "judul" => "required",
            "tanggal" => "required",
            "skema" => "required",
            "topik" => "required",
            "bidangIlmu" => "required",
            "file" => "required",
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        // $filepath = 'uploads/' . $fileName;
        $nidnUser = Auth::user()->nidn;

        try{
           $proposal =Proposal::create([
                "peneliti" => $request->nama,
                "judul" => $request->judul,
                "tanggal" => $request->tanggal,
                "skema" => $request->skema,
                "topik" => $request->topik,
                "bidang_ilmu" => $request->bidangIlmu,
                "file" => $fileName,
                "nidn_dosen" => $nidnUser,
           ]);
           return redirect("/tambah-anggota/{$proposal->id}");
            } catch(Exception $e) {
                return back()->with("error", $e->getMessage());
            }
    }

    public function download($filename)
    {
        $file_path = public_path("uploads/".$filename);

        if (file_exists($file_path)) {
            return response()->download($file_path, $filename);
        } else {
            abort(404, 'File not found');
        }
    }


}
