<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Barang;

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


}