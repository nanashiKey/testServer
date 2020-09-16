<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Barang;
use App\Http\Models\Transaksi;
use App\User;


class BarangController extends Controller{

    public function _construct(){
        // constructor
        $this->middleware('auth');
    }

    public function createData(Request $req){
        $barang = Barang::create([
            'namabarang' => $req->input('namabarang'),
            'hargabarang' => $req->input('hargabarang'),
            'stock' => $req->input('stock')
        ]);
        $response=[
            'status'=>'success',
            'message'=>'barang berhasil dibuat',
        ];

        return response()->json($response, 200);
    }

    public function getAllBarang(){
        $barang = Barang::all();

        if($barang->isEmpty()){
            $response=[
                'status'=>'unsuccessfull',
                'message'=>'barang kosong'
            ];
            return response()->json($response, 400);
        }else{
            $response=[
                'status'=>'success',
                'message'=>'list barang',
                'data' => $barang,
            ];
            return response()->json($response, 200);
        }
    }

    public function deleteBarang(Request $req){
        $id = $req->id;
        $barangid = Barang::where('id', $id)->first();
        if($barangid == null){
            $response=[
                'status'=>'unsuccessfull',
                'message'=>'barang tidak tersedia'
            ];
            return response()->json($response, 400);
        }else{
            $barangid->delete();
            $response=[
                'status'=>'success',
                'message'=>'barang berhasil dihapus',
            ];
            return response()->json($response, 200);
        }
    }

    public function beliItem(Request $req){
        $id = $req->userid;
        $barangid = $req->barangid;
        $barang = Barang::where('id', $barangid)->first();
        $user = User::where('id', $id)->first();
        if($barang->stock != 0){
            $barang->stock = $barang->stock - 1;
            $barang->save();
            $user->point = $user->point + 5;
            $user->save();
            $transaksi = Transaksi::create([
                'itemid' => $barangid,
                'usrid' => $id,
                'status' => 1
            ]);
            
            $response=[
                'status'=>'success',
                'message'=>'pembelian berhasil',
            ];
    
            return response()->json($response, 200);
        }else{
            $response=[
                'status'=>'failed',
                'message'=>'pembelian gagal, barang habis',
            ];
    
            return response()->json($response, 400);
        }
    }
}