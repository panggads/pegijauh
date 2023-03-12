<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;


class WelcomeController extends Controller
{
    public function index(){
       // $beritas = Berita::orderBy('created_at', 'DESC')->get();
        $destinasis = Destinasi::latest()->take(6)->get();
        $favorits = Destinasi::where('favorit', '=', 1)->take(3)->get();

        //$medialains = MediaLain::latest()->take(5)->get();

        return view('welcome', compact('destinasis', 'favorits'));
    }

    public function read($id){
        $detail = Berita::findOrFail($id);
        $beritas = Berita::latest()->take(6)->get();
        $medialains = MediaLain::latest()->take(6)->get();
        return view('site.berita.read', compact('detail', 'medialains', 'beritas'));
    }
}
