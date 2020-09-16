<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Hadiah;

class HadiahController extends Controller{
    public function _construct(){
        // constructor
        $this->middleware('auth');
    }

    public function createData(Request $req){
        $barang = Hadiah::create([
            'namahadiah' => $req->input('namahadiah'),
            'point' => $req->input('point'),
            'banyakitem' => $req->input('banyakitem')
        ]);
        $response=[
            'status'=>'success',
            'message'=>'hadiah berhasil dibuat',
        ];

        return response()->json($response, 200);
    }

    public function getAllHadiah(){
        $hadiah = Hadiah::all();

        if($hadiah->isEmpty()){
            $response=[
                'status'=>'unsuccessfull',
                'message'=>'hadiah kosong'
            ];
            return response()->json($response, 400);
        }else{
            $response=[
                'status'=>'success',
                'message'=>'list hadiah',
                'data' => $hadiah,
            ];
            return response()->json($response, 200);
        }
    }
}