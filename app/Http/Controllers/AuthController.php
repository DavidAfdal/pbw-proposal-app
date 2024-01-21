<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.pages.register');
    }

    public function handleRegister(Request $request) {
        $request->validate([
            'nidn' => 'required|unique:dosen',
            'nama' => 'required',
            'password' => 'required|min:6',
        ], [
            'nidn.required' => 'NIDN is required.',
            'nidn.unique' => 'NIDN has already been taken.',
            'nama.required' => 'Nama is required.',
            'password.required' => 'Kata Sandi is required.',
            'password.min' => 'Kata Sandi must be at least :min characters.',
        ]);

        Dosen::create([
            "nidn" => $request->nidn,
            "nama" => $request->nama,
            "password" => Hash::make($request->password),
        ]);

        return redirect("/")->with("succes", 'You have signed-in');
    }

    public function login() {

        return view('auth.pages.login');
    }

    public function handleLogin(Request $request) {
        $request->validate([
            'nidn' => 'required',
            'password' => 'required',
        ], [
            'nidn.required' => 'NIDN is required.',

            'password.required' => 'Kata Sandi is required.',
        ]);

        $credentials = $request->only('nidn', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
            case 'admin':
                return redirect()->intended('admin/dashboard')
                    ->withSuccess('Signed in');
                break;
            case 'peninjau':
                return redirect()->intended('peninjau/daftar-tinjauan')
                    ->withSuccess('Signed in');
                break;
            default:
                return redirect()->intended('home')
                    ->withSuccess('Signed in');
        }

        }
        return back()->with("errMsg", 'Login details are not valid');
    }



    public function logout()
    {
        Auth::logout();

        return redirect('/'); // Redirect to the login page after logout
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
