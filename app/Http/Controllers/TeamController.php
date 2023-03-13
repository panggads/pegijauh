<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10; // Number of items to show per page
        $searchTerm = $request->input('searchTerm', ''); // Search term from AJAX request

        // Query the Berita model to get all the items
        $query = Team::query();

        // If a search term is provided, filter the results by the search term
        if (!empty($searchTerm)) {
            $query->where('nama', 'like', '%' . $searchTerm . '%');
        }

        // Paginate the results
        $teams = $query->paginate($perPage);
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'ig' => 'nullable|string',
            'twitter' => 'nullable|string',
            'wa' => 'nullable|string'
        ]);

        $team = new Team;
        $team->nama = $request->nama;
        $team->posisi = $request->posisi;
        $team->keterangan = $request->keterangan;
        $team->foto = $request->foto;
        $team->ig = $request->ig;
        $team->twitter = $request->twitter;
        $team->wa = $request->wa;
        $team->save();
        return redirect()->route('team.show', $team->id)->with('success', $team->nama.' created successfully.');
    
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.show', compact('team'));
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->nama = $request->nama;
        $team->posisi = $request->posisi;
        $team->keterangan = $request->keterangan;
       // $team->foto = $request->foto;
        $team->ig = $request->ig;
        $team->twitter = $request->twitter;
        $team->wa = $request->wa;
        $team->save();
        return redirect()->route('team.show', [$team->id]);
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams.index');
    }

    public function upload(Request $request)
    {
       

            $model = Team::find($request->input('id'));
            if (!$model) {
                return response()->json(['message' => 'Record not found'], 404);
            }

            // Check if the cover file exists and delete it if it does
            if ($request->hasFile('image') && $model->foto) {
                $cover_path = Storage::url('public/img/team/' . $model->foto);
                if (File::exists($cover_path)) {
                    File::delete($cover_path);
                }
            }

            // Update the cover field if a new file was uploaded
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $image = $request->file('image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = $image->storeAs('public/img/team', $name);
                    $image->move($destinationPath, $name);
        
                    $url = 'storage/img/team/'.$name;

                    $model->foto = $name;
                    $model->save();
                }
            }          

            return response()->json([
                'url' => $url
            ], 200);
        return;
    }
}
