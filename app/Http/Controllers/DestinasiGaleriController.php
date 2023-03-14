<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\DestinasiGaleri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DestinasiGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_destinasi' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'nullable|string',
        ]);
        
        $destinasi = Destinasi::find($request->input('id_destinasi'));
        if (!$destinasi) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $galeri = new DestinasiGaleri;
        $galeri->id_destinasi = $destinasi->id;
        $galeri->keterangan = $request->keterangan;
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/img/galeri', $filename);
            $galeri->foto = $filename;
        }
        
        $galeri->save();
        
        return redirect()->route('galeri.show', $destinasi->id)->with('success', $galeri->nama.' created successfully.');
    }

    /** 
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Destinasi::findOrFail($id);

        return view('galeris.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = DestinasiGaleri::findOrFail($id);
        return view('galeris._edit', compact('model'));
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
    public function destroy(DestinasiGaleri $galeri)
    {

        $cover_path = Storage::url('public/img/galeri/' . $galeri->foto);
        if (File::exists($cover_path)) {
            File::delete($cover_path);
        }
        $galeri->delete();
        return redirect()->route('galeri.show', $galeri->id_destinasi)->with('success', $galeri->nama.' deleed successfully.');
    }

    
}
