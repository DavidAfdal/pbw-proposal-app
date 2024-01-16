<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regsiter()
    {
        return view('auth.pages.register');
    }

    public function handleRegister(Request $request) {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosen',
            'password' => 'required|min:6',
        ], [
            'nidn.required' => 'NIDN is required.',
            'nidn.unique' => 'NIDN has already been taken.',
            'nama.required' => 'Nama is required.',
            'password.required' => 'Kata Sandi is required.',
            'password.min' => 'Kata Sandi must be at least :min characters.',
        ]);

        // $data = $request->all();
        // $check = $this->create($data);
        return redirect("login")->withSuccess('You have signed-in');
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
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }
        return back()->withSuccess('Login details are not valid');
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
