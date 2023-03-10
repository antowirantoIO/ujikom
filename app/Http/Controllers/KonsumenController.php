<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $konsumen = User::role('konsumen')->get();

        return view('konsumen.index', compact('konsumen'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = 'KONSUMEN' . str_pad(User::role('konsumen')->orderBy('id', 'desc')->first()->id ?? 0 + 1, 4, '0', STR_PAD_LEFT);

        return view('konsumen.create', compact('kode'));

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

        $user->assignRole('konsumen');

        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('konsumen.show', compact('konsumen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('konsumen.edit', compact('konsumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $konsumen)
    {
        $konsumen->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $konsumen)
    {
        $konsumen->delete();

        return redirect()->route('konsumen.index')->with('success', 'Data Konsumen Berhasil Dihapus');
    }
}
