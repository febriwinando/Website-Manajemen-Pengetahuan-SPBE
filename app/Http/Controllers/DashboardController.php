<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Pengunjung;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    public function index()
    {
        $artikels = Artikel::paginate(18);

        return view('dashboard', compact('artikels'));
    }

    public function tentang()
    {
        $artikels = Artikel::paginate(18);

        return view('profil', compact('artikels'));
    }

    public function cariartikel(){


        $artikels = Artikel::latest();

        return view('dashboard', [
            "artikels" => Artikel::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);

    }

    public function bacaartikel(string $id){
        $artikel = Artikel::findOrFail($id);

        $pengunjung = Pengunjung::where('artikel_id', $id)->first();

        if(!$pengunjung){
            $add_pengunjung = new Pengunjung();
            $add_pengunjung->artikel_id = $id;
            $add_pengunjung->jumlah_pengunjung = 1;

            $add_pengunjung->save();
        }else{
            Pengunjung::where('artikel_id', $id)->update(['jumlah_pengunjung' => $pengunjung->jumlah_pengunjung + 1]);
        }

        return view('read', [
            'artikel'=>$artikel
        ]);
    }


    public function download(string $filename)
    {
        $file = storage_path("app/public/documents/{$filename}");

        // Send a download response with the file
        return response()->download($file);
    }
}
