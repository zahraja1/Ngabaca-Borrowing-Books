<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BukuApiController extends Controller
{
    public function index(){
        $buku = Buku::get()
        ->map(function($buku){
            return $this->format($buku);
        });
        return $this->response($buku);
    }

    public function detail($id){
        $buku = Buku::where('id', $id)
        ->get()
        ->map(function($buku){
            return $this->format($buku);
        });
        return $this->response($buku);
    }


    public function tambah(Request $request){

        $validasi = Validator::make($request->all(),[
            'gendre_id'=>'required',
            'jenis_id'=>'required',
            'judul'=>'required',
            'author'=>'required',
            'thumbnail'=>'required',
        ]);

        if($validasi->fails()){
            $valindex = $validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }

        $buku = Buku::create([
            'gendre_id'=>$request->gendre_id,
            'jenis_id'=>$request->jenis_id,
            'judul'=>$request->judul,
            'author'=>$request->author,
            'thumbnail'=>$request->file('thumbnail')->store('img_bootcamp'),
            'slug'=>$request->slug,
        ]);

        $buku = Buku::where('id', $buku->id)
        ->get()
        ->map(function($buku){
            return $this->format($buku);
        });
        return $this->response($buku);
    }
   
    public function format($buku){
        return [
            'gendre'=>$buku->gendre_id,
            'jenis'=>$buku->jenis_id,
            'judul'=>$buku->judul,
            'author'=>$buku->author,
            'buku'=>$buku->thumbnail,
            'tanggal_tambah' => Carbon::parse($buku->created_at)->translatedFormat('d F Y'),
        ];
    }
    public function response($buku){
        return response()->json([
            'status'=>true,
            'data'=>$buku,
        ],200);
    }

    public function hapus(Request $request){
        $buku = Buku::where('id', $request->id)->first();

        if(!$buku){
            return MessageHelper::error(false, 'data tidak tersedia');
        }
        Storage::delete($buku->thumbnail);
        $buku->delete();
        return MessageHelper::error(true, 'berhasil hapus data');
    }

    public function update(Request $request, $id){
        $buku = Buku::where('id', $id)->first();
        if(!$buku){
            return MessageHelper::error(false, 'data tidak ditemukan');
        }
        $validasi = Validator::make($request->all(), [
            'gendre_id'=> ['required'],
            'jenis_id'=>['required'],
            'judul'=>['required'],
            'author'=>['required'],
            'thumbnail'=>['required'],
        ]);
        if($validasi->fails()){
            $valindex = $validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }

        $buku->update([
            'gendre'=>$buku->gendre_id,
            'jenis'=>$buku->jenis_id,
            'judul'=>$buku->judul,
            'author'=>$buku->author,
            'buku'=>$buku->thumbnail,
        ]);

        $detail = Buku::where('id', $buku->id)
        ->get()
        ->map(function($buku){
            return $this->format($buku);
        });

        $pesan = "berhasil menambahkan data buku";
        return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }
}
