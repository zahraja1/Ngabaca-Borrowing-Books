<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanApiController extends Controller
{
    public function index(){
        $peminjaman = Peminjaman::get()
        ->map(function($peminjaman){
            return $this->format($peminjaman);
        });
        return $this->response($peminjaman);
    }
    public function dateail($id){
        $peminjaman = Peminjaman::where('id', $id)
        ->get()
        ->map(function($peminjaman){
            return $this->format($peminjaman);
        });
        return $this->response($peminjaman);
    }

    public function tambah(Request $request){

        $validasi = Validator::make($request->all(),[
        'user_id'=>'required',
        'buku_id'=>'required',
        'kode_peminjaman'=>'required',
        'tanggal_peminjaman'=>'required',
        'tanggal_pengembalian'=>'required'
        ]);

        if($validasi->fails()){
            $valindex = $validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }

        $peminjaman = Peminjaman::create([
            'user_id'=>$request->user_id,
            'buku_id'=>$request->buku_id,
            'kode_peminjaman'=>$request->kode_peminjaman,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
            'tanggal_peminjaman'=>$request->tanggal_peminjaman,
        ]);

        $peminjaman = Peminjaman::where('id', $peminjaman->id)
        ->get()
        ->map(function($peminjaman){
            return $this->format($peminjaman);
        });
        return $this->response($peminjaman);
    }

    public function format($peminjaman){
        return [
            'customer'=>$peminjaman->user_id,
            'judul'=>$peminjaman->buku_id,
            'kode_peminjaman'=>$peminjaman->kode_peminjaman,
            'tanggal_peminjamamn'=>$peminjaman->tanggal_peminjamamn,
            'tanggal_pengembalian'=>$peminjaman->tanggal_pengembalian,
            'tanggal_tambah' => Carbon::parse($peminjaman->created_at)->translatedFormat('d F Y'),
        ];
    }
    public function response($peminjaman){
        return response()->json([
            'status'=>true,
            'data'=>$peminjaman,
        ]);
    }
    public function hapus(Request $request){
        $peminjaman = Peminjaman::where('id',$request->id )->first();

        if(!$peminjaman){
            return MessageHelper::error(false, 'Peminjaman tidak ditemukan');
        }
       $peminjaman->delete();
    }

    public function update(Request $request, $id){
        $peminjaman = Peminjaman::where('id', $id)->first();
        if(!$peminjaman){
            return MessageHelper::error(false, 'data tidak di temukan');
        }
        $validasi = Validator::make($request->all(), [
            'user_id'=>['required'],
            'buku_id'=>['required'],
            'kode_peminjaman'=>['required'],
            'tanggal_peminjaman'=>['required'],
            'tanggal_pengembalian'=>['required']
        ]);
        if($validasi->fails()){
            $valindex = $validasi->errors()->all();
            return MessageHelper::error(false, $valindex[0]);
        }
        $peminjaman->update([
            'customer'=>$peminjaman->user_id,
            'judul'=>$peminjaman->buku_id,
            'kode_peminjaman'=>$peminjaman->kode_peminjaman,
            'tanggal_peminjamamn'=>$peminjaman->tanggal_peminjamamn,
            'tanggal_pengembalian'=>$peminjaman->tanggal_pengembalian,
        ]);
        $detail = Peminjaman::where('id', $peminjaman->id)
        ->get()
        ->map(function($peminjaman){
            return $this->format($peminjaman);
        });

        $pesan = "berhasil menambahkan data buku";
        return MessageHelper::resultAuth(true, $pesan, $detail, 200);
    }
}
