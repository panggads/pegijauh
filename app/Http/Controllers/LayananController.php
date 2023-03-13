<?php
namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10; // Number of items to show per page
        $searchTerm = $request->input('searchTerm', ''); // Search term from AJAX request

        // Query the Berita model to get all the items
        $query = Layanan::query();

        // If a search term is provided, filter the results by the search term
        if (!empty($searchTerm)) {
            $query->where('nama', 'like', '%' . $searchTerm . '%');
        }

        // Paginate the results
        $layanans = $query->paginate($perPage);
        return view('layanans.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanans.create');
    }

    public function store(Request $request)
    {
        $layanan = Layanan::create($request->all());
        return redirect()->route('layanan.show', $layanan->id)->with('success', $layanan->nama.' created successfully.');
    }

    public function show($id)
    {
        $model = Layanan::findOrFail($id);
        return view('layanans.show', compact('model'));
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanans.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());
        return redirect()->route('layanan.show', [$layanan->id]);
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->route('layanan.index');
    }

    public function upload(Request $request)
    {
       

            $model = Layanan::find($request->input('id'));
            if (!$model) {
                return response()->json(['message' => 'Record not found'], 404);
            }

            // Check if the cover file exists and delete it if it does
            if ($request->hasFile('image') && $model->cover) {
                $cover_path = Storage::url('public/img/' . $model->cover);
                if (File::exists($cover_path)) {
                    File::delete($cover_path);
                }
            }

            // Update the cover field if a new file was uploaded
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = $image->storeAs('public/img', $name);
                    $image->move($destinationPath, $name);
        
                    $url = 'storage/img/'.$name;

                    $model->cover = $name;
                    $model->save();
                }
            }          

            return response()->json([
                'url' => $url
            ], 200);
        return;
    }
}
