<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller{
    public function _construct(){
        // constructor
        $this->middleware('auth');
    }

    public function registerUser(Request $req){
        $cekUser = User::where('username', $req->username)->first();
        if($cekUser == null){            
            $user = User::create([
                'username' => $req->input('username'),
                'email' => $req->input('email'),
                'password' => Crypt::encrypt($req->password),
                'point' => $req->input('point')
            ]);
            $response=[
                'status'=>'success',
                'message'=>'user berhasil dibuat',
            ];
    
            return response()->json($response, 200);
        }else{
        $response=[
            'status'=>'failed',
            'message'=>'user dengan nama tersebut sudah ada',
        ];

        return response()->json($response, 400);
        }
    }

    public function userLogin(Request $req){
        $username = $req->username;
        $pass = $req->password;
        $cekUser = User::where("username", $username)->first();
        if($cekUser == null){
            $response=[
                'status'=>'failed',
                'message'=>'user tidak ditemukan',
            ];
    
            return response()->json($response, 400);
        }else{
            $decryptPass ;
            try {
                $decryptPass = Crypt::decrypt($cekUser->password);
            } catch (DecryptException $e) {
                //
                error_logg($e);
            }
            if($decryptPass == $pass && $username == $cekUser->username){
                $response=[
                    'status'=>'success',
                    'message'=>'Login berhasil',
                    'data'=>[$cekUser]
                ];
        
                return response()->json($response, 200);
            }else{
                $response=[
                    'status'=>'failed',
                    'message'=>'login tidak berhasil username atau password salah',
                ];
        
                return response()->json($response, 400);
            }
        }

    }

    public function delUser(Request $req){
        $id = $req->id;
        $cekUser = User::where('id', $id)->first();
        if($cekUser == null){
            $response=[
                'status'=>'failed',
                'message'=>'user tidak ditemukan',
            ];
    
            return response()->json($response, 400);
        }else{
            $cekUser->delete();
            $response=[
                'status'=>'success',
                'message'=>'user berhasil dihapus',
            ];
    
            return response()->json($response, 200);
        }
    }

    public function getAllUser(){
        $users = User::all();

        if($users->isEmpty()){
            $response=[
                'status'=>'unsuccessfull',
                'message'=>'user tidak ditemukan'
            ];
            return response()->json($response, 400);
        }else{
            $response=[
                'status'=>'success',
                'message'=>'list all user',
                'data' => $users,
            ];
            return response()->json($response, 200);
        }
    }

    public function userById($id){
        $checkUser = User::where('id', $id)->first();
        if($checkUser == null){
            $response=[
                'status'=>'success',
                'message'=>'user tidak ditemukan',
            ];
            return response()->json($response, 400);
        }else{
            $response=[
                'status'=>'success',
                'message'=>'user list',
                'data' => $checkUser,
            ];
            return response()->json($response, 200);
        }
    }
}