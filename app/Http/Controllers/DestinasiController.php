<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DestinasiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10; // Number of items to show per page
        $searchTerm = $request->input('searchTerm', ''); // Search term from AJAX request

        // Query the Berita model to get all the items
        $query = Destinasi::query();

        // If a search term is provided, filter the results by the search term
        if (!empty($searchTerm)) {
            $query->where('judul', 'like', '%' . $searchTerm . '%');
        }

        // Paginate the results
        $destinasis = $query->paginate($perPage);
        //$destinasis = Destinasi::all();
        return view('destinasi.index', compact('destinasis'));
    }

    public function show($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('destinasi.show', compact('destinasi'));
    }
    
    public function create()
    {
        return view('destinasi.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'konten' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favorit' => 'nullable|integer|min:0|max:99'
        ]);
        
        $destinasi = new Destinasi;
        $destinasi->nama = $request->nama;
        $destinasi->lokasi = $request->lokasi;
        $destinasi->keterangan = $request->keterangan;
        $destinasi->konten = $request->konten;
        $destinasi->favorit = 0;
        
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/destinasi', $filename);
            $destinasi->cover = $filename;
        }
        
        $destinasi->save();

        return redirect()->route('destinasi.show', $destinasi->id)->with('success', $destinasi->nama.' created successfully.');
    }
    
    public function update(Request $request, $id)
    {
        if($request->favorit === 'on')
            $favorit = 1;
        else
            $favorit = 0;

        $destinasi = Destinasi::findOrFail($id);
        $destinasi->nama = $request->nama;
        $destinasi->lokasi = $request->lokasi;
        $destinasi->keterangan = $request->keterangan;
        $destinasi->konten = $request->konten;
        $destinasi->favorit = $favorit;
        
        $destinasi->save();
        return redirect()->route('destinasi.show', $id)->with('success', $destinasi->nama.' updated successfully.');
    }
        
    public function destroy(Destinasi $destinasi)
    {
        $destinasi->delete();
        
        return redirect()->route('destinasi.index')->with('success', 'Destinasi deleted successfully.');
    }

    public function upload(Request $request)
    {
       

            $destinasi = Destinasi::find($request->input('id'));
            if (!$destinasi) {
                return response()->json(['message' => 'Record not found'], 404);
            }

            // Check if the cover file exists and delete it if it does
            if ($request->hasFile('image') && $destinasi->cover) {
                $cover_path = Storage::url('public/img/destinasi/' . $destinasi->cover);
                if (File::exists($cover_path)) {
                    File::delete($cover_path);
                }
            }

            // Update the cover field if a new file was uploaded
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = $image->storeAs('public/img/destinasi', $name);
                    $image->move($destinationPath, $name);
        
                    $url = 'storage/img/destinasi/'.$name;

                    $destinasi->cover = $name;
                    $destinasi->save();
                }
            }          

            return response()->json([
                'url' => $url
            ], 200);
        return;
    }


}   