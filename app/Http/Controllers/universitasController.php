<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\universitas;

class universitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universitas = universitas::latest()->paginate(5);
        return view ('universitas.index', compact('universitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('universitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi form
        $this->validate($request, [
            'nama'=>'required',
            'alamat'=>'required',
            'no_telpon'=>'required',
            'email'=>'required|email',
            'akreditasi'=>'required',
        ]);

        //create post
        universitas::create([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_telpon'=>$request->no_telpon,
            'email'=>$request->email,
            'akreditasi'=>$request->akreditasi,
        ]);

        //redirect ke index
        return redirect()->route('universitas.index')->with(['success'=>'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get post by ID 
        $universitas = universitas::findOrFail($id);
        return view('universitas.show', compact('universitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $universitas = universitas::findOrFail($id);
        return view('universitas.edit', compact('universitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'no_telpon'=>'required',
            'email'=>'required|email',
            'akreditasi'=>'required',
            ]);

        $universitas = universitas::findOrFail($id);

        $universitas->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_telpon'=>$request->no_telpon,
            'email'=>$request->email,
            'akreditasi'=>$request->akreditasi,
            ]);
       
        return redirect()->route('universitas.index')->with(['success'=>'Data Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $universitas = universitas::findOrFail($id);

        //hapus post 
        $universitas->delete();

        //redirect to index
        return redirect()->route('universitas.index')-> with(['success'=>'Data Berhasil di Hapus!']);

    }
}
