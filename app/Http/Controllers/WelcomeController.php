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

        return view('sites.welcome', compact('destinasis', 'favorits', 'teams', 'services', 'galeris'));
    }

    public function destinasi(){
        $destinasis = Destinasi::latest()->get();
        return view('sites.destinasi', compact('destinasis'));
    }

    public function galeri(){
        $galeris = DestinasiGaleri::get();
        return view('sites.galeri', compact('galeris'));
    }

    public function about(){
        return view('sites.about');
    }
}
