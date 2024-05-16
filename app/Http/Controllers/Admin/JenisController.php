<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jenis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::all();
        return view('Admin.jenis.base', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view('Admin.jenis.createJenis',compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jenis::create([
            'jenis' => $request->input('jenis'),
            'slug' => Str::slug($request->input('jenis')),
        ]);
        
        return redirect()->route('jenis.index')->with('Create', "berhasil Menambahkan Data Jenis");
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('Admin.jenis.updateJenis', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->jenis=$request->jenis;
        $jenis->slug = Str::slug($request->jenis);
        $jenis->update();
        return redirect()->route('jenis.index')->with('Update','Berhasil Update jenis buku ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->back()->with("delete",'Berhasil Update Data Jenis Buku!');
    }
}
