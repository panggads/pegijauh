<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\DestinasiGaleri;
use App\Models\Team;
use App\Models\Layanan;


class WelcomeController extends Controller
{
    public function index(){

        $destinasis = Destinasi::latest()->take(6)->get();
        $favorits = Destinasi::where('favorit', '=', 1)->take(3)->get();

        $teams = Team::get();

        $services = Layanan::get();

        $galeris = DestinasiGaleri::get();

        return view('welcome', compact('destinasis', 'favorits', 'teams', 'services', 'galeris'));
    }

    public function read($id){
        $detail = Berita::findOrFail($id);
        $beritas = Berita::latest()->take(6)->get();
        $medialains = MediaLain::latest()->take(6)->get();
        return view('site.berita.read', compact('detail', 'medialains', 'beritas'));
    }
}
