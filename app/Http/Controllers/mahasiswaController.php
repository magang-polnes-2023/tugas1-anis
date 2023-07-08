<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\Storage;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::latest()->paginate(5);
        return view ('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi form
        $this->validate($request, [
            'nama'=>'required',
            'nim'=>'required',
            'no_telpon'=>'required',
            'umur'=>'required',
            'alamat'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image=$request->file('image');
        $image->storeAs('public/post', $image->hashName());

        //create post
        mahasiswa::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'no_telpon'=>$request->no_telpon,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'image'=>$image->hashName(),
        ]);

        //redirect ke index
        return redirect()->route('mahasiswa.index')->with(['success'=>'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get post by ID 
        $mahasiswa = mahasiswa::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
