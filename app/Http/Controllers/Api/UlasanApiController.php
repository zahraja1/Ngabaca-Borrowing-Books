<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UlasanApiController extends Controller
{
    public function index(){
        $ulasan = Ulasan::get()
        ->map(function($ulasan){
            return $this->format($ulasan);
        });
        return $this->response($ulasan);
    }

    public function dateail($id){
        $ulasan = Ulasan::where('id', $id)
        ->get()
        ->map(function($ulasan){
            return $this->format($ulasan);
        });
        return $this->response($ulasan);
    }

    public function tambah(Request $request){

        $validasi = Validator::make($request->all(),[
        'user_id'=>'required',
        'buku_id'=>'required',
        'komentar'=>'required',
        'rating'=>'required'
        ]);

        if($validasi->fails()){
            $valindex = $validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }

        $ulasan = Ulasan::create([
            'user_id'=>$request->user_id,
            'buku_id'=>$request->buku_id,
            'komentar'=>$request->komentar,
            'rating'=>$request->rating
        ]);

        $ulasan = Ulasan::where('id', $ulasan->id)
        ->get()
        ->map(function($ulasan){
            return $this->format($ulasan);
        });
        return $this->response($ulasan);
    }

    public function format($ulasan){
        return [
            'customer'=>$ulasan->user_id,
            'judul'=>$ulasan->buku_id,
            'komentar'=>$ulasan->komentar,
            'rating'=>$ulasan->rating,
            'tanggal_tambah' => Carbon::parse($ulasan->created_at)->translatedFormat('d F Y'),
        ];
    }
    public function response($ulasan){
        return response()->json([
            'status'=>true,
            'data'=>$ulasan,
        ]);
    }
    public function hapus(Request $request){
        $ulasan = Ulasan::where('id',$request->id )->first();

        if(!$ulasan){
            return MessageHelper::error(false, 'Ulasan tidak ditemukan');
        }
       $ulasan->delete();
    }

    public function update(Request $request, $id){
        $ulasan = Ulasan::where('id', $id)->first();
        if(!$ulasan){
            return MessageHelper::error(false, 'data tidak di temukan');
        }
        $validasi = Validator::make($request->all(), [
            'user_id'=>['required'],
        'buku_id'=>['required'],
        'komentar'=>['required'],
        'rating'=>['required'] 
        ]);
        if($validasi->fails()){
            $valindex = $validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }
        $ulasan->update([
            'customer'=>$ulasan->user_id,
            'judul'=>$ulasan->buku_id,
            'komentar'=>$ulasan->komentar,
            'rating'=>$ulasan->rating,
        ]);
        $detail = Ulasan::where('id', $ulasan->id)
        ->get()
        ->map(function($ulasan){
            return $this->format($ulasan);
        });

        $pesan = "berhasil menambahkan data buku";
        return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }
}
