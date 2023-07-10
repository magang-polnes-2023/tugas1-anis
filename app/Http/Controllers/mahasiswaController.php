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
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if(strlen($katakunci)){
            $mahasiswa = mahasiswa::where('nim','like',"%$katakunci%")
                ->orWhere('nama','like',"%$katakunci%")
                ->paginate(5);
        }
        else{
            $mahasiswa = mahasiswa::latest()->paginate(5);
        }
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
            'image'=>'required|image|mimes:jpeg,jpg,png|max:100000',
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
            'image'=>$image->hashName()
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
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'nama'=>'required',
            'nim'=>'required|numeric',
            'no_telpon'=>'required|numeric',
            'umur'=>'required|numeric',
            'alamat'=>'required',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required',
            'image'=>'image|mimes:jpeg,jpg,png|max:100000',
        ]);
        $mahasiswa = mahasiswa::findOrFail($id);

        if ($request->hasFile('image')){

            $image = $request->file('image');
            $image->storeAs('public/post', $image->hashName());

            Storage::delete('public/post' .$mahasiswa->image);

            $mahasiswa->update([
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'no_telpon'=>$request->no_telpon,
                'umur'=>$request->umur,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'image'=>$image->hashName()
            ]);
        }
        else {
            $mahasiswa->update([
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'no_telpon'=>$request->no_telpon,
                'umur'=>$request->umur,
                'alamat'=>$request->alamat,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
            ]);
        }
        return redirect()->route('mahasiswa.index')->with(['success'=>'Data Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        //hapus gambar
        Storage::delete('public/post'. $mahasiswa->image);

        //hapus post 
        $mahasiswa->delete();

        //redirect to index
        return redirect()->route('mahasiswa.index')-> with(['success'=>'Data Berhasil di Hapus!']);
    }
}
