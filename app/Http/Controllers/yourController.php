<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class yourController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $buku = Buku::where('name', 'LIKE', '%' . $query . '%')->get();

        return inertia('SearchResults', ['buku' => $buku]);
    }
}
