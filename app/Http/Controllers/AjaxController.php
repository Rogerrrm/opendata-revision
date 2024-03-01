<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use  App\Models\User;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function allUsers(){
        $users=DB::table('users')->get();

        return  response()->json([
            'message' => $users]);
    }
    public function prueba2(Request $request){
        $usermodel=User::find($request->valor[2]["_value"]);
        $usermodel->name=$request->valor[1]["_value"];
        $usermodel->email=$request->valor[0]["_value"];
       $usermodel->save();

        return  response()->json([
            'message' =>$request->valor[1]["_value"]]);
    }
    public function inssert(Request $request){
        $user_model=new User;
        $user_model->name= $request->valor[1]["_value"];
        $user_model->email=$request->valor[0]["_value"];
        $user_model->rol=$request->valor[3]["_value"];
        $user_model->nom_empresa=$request->valor[4]["_value"];
        $user_model->telefono=$request->valor[5]["_value"];
        $user_model->password= Hash::make($request->valor[6]["_value"]);
        $user_model->save();

        return  response()->json([
            'message' =>$request->valor]);
    }
    public function disable_main(Request $request){
        $usermodel=User::find($request->valor[2]["_value"]);
        $usermodel->disable_acoount=1;
         $usermodel->save();

        return  response()->json([
            'message' =>1]);
    }
    public function rol(Request $request){
        $usermodel=User::find($request->valor[2]["_value"]);
        $usermodel->rol=$request->valor[1]["_value"];
         $usermodel->save();

        return  response()->json([
            'message' =>1]);
    }
}


