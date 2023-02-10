<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $karyawan = User::role('karyawan')->get();

        return view('karyawan.index', compact('karyawan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $kode = 'KARYAWAN' . str_pad(User::role('karyawan')->orderBy('id', 'desc')->first()->id ?? 0 + 1, 4, '0', STR_PAD_LEFT);

        return view('karyawan.create', compact('kode'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            'kode_user' => 'unique:users',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'kode_user' => $request->kode_user,
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('karyawan');

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function edit(User $id)
    {
        $karyawan = User::findOrFail($id);

        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $id)
    {
        $karyawan = User::findOrFail($id);

        $karyawan->update([
            'name' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan Berhasil Dihapus');
    }
}
