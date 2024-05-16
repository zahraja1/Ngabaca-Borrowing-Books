<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buku;
use App\Models\Jenis;
use App\Models\Gendre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBukuRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $gendre = Gendre::all();
        $jenis = Jenis::all();
        return view('Admin.buku.Base', compact('buku','gendre','jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $gendre = Gendre::all();
        $jenis = Jenis::all();
        return view('Admin.buku.createBuku', compact('gendre','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Buku::create([
            'gendre_id'=>$request->gendre_id,
            'jenis_id'=>$request->jenis_id,
            'judul'=>$request->judul,
            'author'=>$request->author,
            'thumbnail'=>$request->file('thumbnail')->store('img_bootcamp'),
            'status'=>$request->status,
            'kuota'=>$request->kuota,
            'slug'=>Str::slug($request->gendre),
        ]);

        return redirect()->route('buku.index')->with('create',"Berhasi Menambahkan Data Bootcamp $request->nama !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenis = Jenis::all();
        $gendre = Gendre::all();
        $buku = Buku::findOrFail($id);

        return view("Admin.buku.updateBuku", compact('jenis', 'gendre', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $buku->update([
            'gendre_id' => $request->gendre_id,
            'jenis_id' => $request->jenis_id,
            'judul' => $request->judul,
            'author' => $request->author,
            'status'=>$request->status,
        ]);

        
       if($request->file('image')){
        $thumbnail = $request->file('image');
        $thumbnail->storeAs('public/images', $thumbnail->hashName());

        Storage::delete('public/images'. $buku->thumbnail);

        $buku->update([
            'thumbnail'=>$thumbnail->hashName(),
        ]);
    }else{
        $buku->gendre_id = $request->gendre_id;
        $buku->jenis_id = $request->jenis_id;
        $buku->judul = $request->judul;
        $buku->author = $request->author;
    }
    $buku->update();
    return redirect()->route('buku.index')->with('Update','Berhasil Update Gendre Buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku = Buku::findOrFail($buku->id);
        Storage::delete($buku->thumbnail);
        $buku->delete();

        return redirect()->back()->with('delete', 'Berhasil update Data Kategori !');
    }

    public function romance(){
        $gendre = Gendre::all();
        $buku = Buku::where('gendre_id', 1)->get();
        return view ('Admin.Buku.romance', compact('gendre', 'buku'));
    }
    public function fantacy(){
        $gendre = Gendre::all();
        $buku = Buku::where('gendre_id', 2)->get();
        return view('Admin.Buku.fantacy', compact('buku', 'gendre'));
    }
    public function ilmiah(){
        $gendre = Gendre::all();
        $buku = Buku::where('gendre_id', 6)->get();
        return view('Admin.Buku.ilmiah', compact('buku', 'gendre'));
    }
    public function fiksi(){
        $jenis = Jenis::all();
        $buku = Buku::where('jenis_id', 9)->get();
        return view('Admin.Buku.fiksi', compact('buku', 'jenis'));
    }
    public function nonfiksi(){
        $jenis = Jenis::all();
        $buku = Buku::where('jenis_id', 10)->get();
        return view('Admin.Buku.nonfiksi', compact('buku', 'jenis'));
    }
   
}
