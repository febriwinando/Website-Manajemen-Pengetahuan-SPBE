<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\UnitKerja;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $artikels = Artikel::all();
        $artikels = Artikel::orderBy('updated_at', 'desc')->take(8)->get();

        $unit_kerjas = UnitKerja::all();


        // Kirim data ke view
        return view('form', compact('artikels'), compact('unit_kerjas'));
    }


    public function daftar_artikel(){
        $artikels = Artikel::orderBy('updated_at', 'desc')->get();

        // Kirim data ke view
        return view('artikel', compact('artikels'));
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
            'nama_penulis' => 'required|string',
            'nip_penulis' => 'required|string|max:18',
            'unit_kerja_penulis' => 'required|string',
            'judul' => 'required|string',
            'nama_pendidikan' => 'required|string',
            'instansi_pelaksana' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'isi' => 'required',
            'dokumen_artikel' => 'nullable|mimes:pdf|max:2048',
            'gambar_artikel' => 'nullable',
        ]);

        // // Simpan data
        $artikel = new Artikel();
        $artikel->nama_penulis = $request->input('nama_penulis');
        $artikel->nip_penulis = $request->input('nip_penulis');
        $artikel->nama_pendidikan = $request->input('nama_pendidikan');
        $artikel->unit_kerja_penulis = $request->input('unit_kerja_penulis');
        $artikel->judul = $request->input('judul');
        $artikel->tanggal_mulai = $request->input('tanggal_mulai');
        $artikel->tanggal_selesai = $request->input('tanggal_selesai');
        $artikel->isi = $request->input('isi');
        $artikel->instansi_pelaksana = $request->input('instansi_pelaksana');

        if ($request->hasFile('gambar_artikel')) {
            $gambar = $request->file('gambar_artikel')->store('images', 'public');
            $artikel->gambar_artikel = $gambar;
        }

        if ($request->hasFile('dokumen_artikel')) {
            $dokumen = $request->file('dokumen_artikel')->store('documents');
            $artikel->dokumen_artikel = $dokumen;
        }

        // // Simpan ke database
        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $unit_kerjas = UnitKerja::all();

        return view('edit', [
            'artikel'=>$artikel,
            'artikels'=>Artikel::orderBy('updated_at', 'desc')->take(8)->get(),
            'unit_kerjas'=>$unit_kerjas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $dateUpdate = $request->validate([
            'nama_penulis' => 'required|string',
            'nip_penulis' => 'required|string|max:18',
            'unit_kerja_penulis' => 'required|string',
            'judul' => 'required|string',
            'nama_pendidikan' => 'required|string',
            'instansi_pelaksana' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'isi' => 'required',
        ]);

        // // Simpan data
        // $artikel = new Artikel();
        // $artikel->nama_penulis = $request->input('nama_penulis');
        // $artikel->nip_penulis = $request->input('nip_penulis');
        // $artikel->nama_pendidikan = $request->input('nama_pendidikan');
        // $artikel->unit_kerja_penulis = $request->input('unit_kerja_penulis');
        // $artikel->judul = $request->input('judul');
        // $artikel->tanggal_mulai = $request->input('tanggal_mulai');
        // $artikel->tanggal_selesai = $request->input('tanggal_selesai');
        // $artikel->isi = $request->input('isi');
        // $artikel->instansi_pelaksana = $request->input('instansi_pelaksana');


        // $rules = [
        //     'title' => 'required|max:255',
        //     'category_id'=> 'required',
        //     'image'=>'image|file|max:5120',
        //     'body'=> 'required'
        // ];



        // if($request->slug != $post->slug){
        //     $rules['slug'] = 'required|unique:posts';
        // }

        // $validateData = $request->validate($rules);

        // if($request->file('image')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validateData['image'] = $request->file('image')->store('post-images');
        // }

        // $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 30);

        Artikel::where('id', $id)->update($dateUpdate);

        return redirect('/artikel')->with('success', 'Telah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $dokumentasi = Artikel::find($id);

        if($dokumentasi->gambar_artikel){
            Storage::delete($dokumentasi->gambar_artikel);
        }

        if($dokumentasi->dokumen_artikel){
            Storage::delete($dokumentasi->dokumen_artikel);
        }

        Artikel::destroy($id);

        return redirect('/artikel')->with('success', '"'.ucwords($dokumentasi->judul).'" Berhasil dihapus.');
    }

    public function nama_penulis(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $results = Artikel::where('nama_penulis', 'LIKE', "%{$query}%")->limit(10)->get();
            return response()->json($results);
        }

        return response()->json([]);
    }
}
