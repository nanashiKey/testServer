<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Hadiah;
use App\Http\Models\Redeemed;
use App\User;

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

    public function redeemedPoint(Request $req){
        $hadiahid = $req->hadiahid;
        $usrid = $req->userid;
        $user = User::where('id', $usrid)->first();
        $hadiah = Hadiah::where('id', $hadiahid)->first();
        if($user->point > $hadiah->point){
            $redeemed = Redeemed::create([
                'hadiahid' => $hadiahid,
                'usrid' => $usrid,
                'redeemed' => 1
            ]);
            if($hadiah->banyakitem != 0){
                $hadiah->banyakitem = $hadiah->banyakitem - 1;
                $hadiah->save();
                $user->point = $user->point - $hadiah->point;
                $user->save();
                $response=[
                    'status'=>'success',
                    'message'=>'hadiah berhasil di redeemed'
                ];
                return response()->json($response, 200);
            }else{
                $response=[
                    'status'=>'failed',
                    'message'=>'item sudah habis'
                ];
                return response()->json($response, 400);
            }
        }else{
            $response=[
                'status'=>'failed',
                'message'=>'point yang kamu miliki kurang'
            ];
            return response()->json($response, 400);
        }
    }

    public function updateHadiah(Request $req, $id){
        $namahadiah = $req->namahadiah;
        $point = $req->point;
        $banyakitem = $req->banyakitem;

        $hadiah = Hadiah::where('id', $id)->first();
        $hadiah->namahadiah = $namahadiah;
        $hadiah->point = $point;
        $hadiah->banyakitem = $banyakitem;
        $hadiah->save();
        $response=[
            'status'=>'success',
            'message'=>'update berhasil',
        ];

        return response()->json($response, 200);
    }

    public function deleteHadiah($id){
        $barangid = Hadiah::where('id', $id)->first();
        if($barangid == null){
            $response=[
                'status'=>'unsuccessfull',
                'message'=>'hadiah tidak tersedia'
            ];
            return response()->json($response, 400);
        }else{
            $barangid->delete();
            $response=[
                'status'=>'success',
                'message'=>'hadiah berhasil dihapus',
            ];
            return response()->json($response, 200);
        }
    }

}