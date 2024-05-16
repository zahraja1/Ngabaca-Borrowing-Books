<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gendre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGendreRequest;
use App\Http\Requests\UpdateGendreRequest;

class GendreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gendre = Gendre::all();
        return view('Admin.gendre.base', compact('gendre'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gendre = Gendre::all();

        return view("Admin.Gendre.createGendre", compact('gendre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gendre::create([
            'gendre' => $request->gendre,
            'slug'=> Str::slug($request->gendre),
        ]);
        return redirect()->route('gendre.index')->with('Create', "Berhasil menambahkan gendre buku");
    }

    /**
     * Display the specified resource.
     */
    public function show(Gendre $gendre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $gendre = Gendre::findOrFail($id);
    return view("Admin.gendre.updateGendre", compact('gendre'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gendre = Gendre::findOrFail($id);
        $gendre->gendre = $request->gendre;
        $gendre->slug = Str::slug($request->gendre);
        $gendre->update();

        return redirect()->route('gendre.index')->with('Update','Berhasil Update Gendre Buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gendre = Gendre::findOrFail($id);
        $gendre->delete();

        return redirect()->back()->with("delete",'Berhasil Update Data Jenis Buku!');
    }
}
