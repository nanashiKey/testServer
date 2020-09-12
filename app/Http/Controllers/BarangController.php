<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller{

    public function _construct(){
        // constructor
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

        $response=[
            'status'=>'success',
            'message'=>'list barang',
            'data' => $barang,
        ];

        return response()->json($response, 200);
    }


}