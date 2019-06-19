<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\Supervisor;
use App\UserModel;
use Validator;
use App\Message;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\DB;

class SupervisorController extends Controller
{
    public function index(){

        $supervisors= Supervisor::all();
        return view('listadoS',compact('supervisors'));
    }

    public function desbloquear($id){
        $user=UserModel::findOrfail($id);
        $user->status='activo';
        $user->attemps=0;
        $user->save();
        if ($user->type=='OPE'){
            return redirect("/listadoO")->with('exito2','La cuenta fue desbloqueada exitosamente');
        }
        else{
            return redirect("/listadoS")->with('exito2','La cuenta fue desbloqueada exitosamente');;
        }

    }

    public function modificar($id){
        $user=UserModel::findOrfail($id);

        if ($user->type=='SUP'){
            $supervisor=Supervisor::findOrfail($id);
            return view('modificar',compact('supervisor','user'));
        }
        else if ($user->type=='OPE'){
            $operator=Operator::findOrfail($id);
            return view('modificar',compact('operator','user'));
        }

    }

    public function modificarDatos(Request $request, $id){
        $user=UserModel::findOrfail($id);

        
        if ($user->type=='SUP'){
            
            $supervisor=Supervisor::findOrfail($id);
            $supervisor->name=$request->name;
            $supervisor->lastname=$request->lastname;
            $supervisor->username=$request->username;
            $supervisor->position=$request->position;
            
                if( $supervisor->position=='operador'){
                     $ope= new Operator;
                     $ope->id=$supervisor->id;
                     $ope->password=$supervisor->password;
                     $ope->name=$request->name;
                     $ope->lastname=$request->lastname;
                     $ope->username=$request->username;
                     $ope->position=$request->position;
                     $ope->attemps=0;
                     $getCode=explode("-",$supervisor->code);
                     $newCode='OPE-'.$getCode[1]."-".$getCode[2];
                     $ope->code=$newCode; 
                     $ope->type='OPE';
                     $ope->save();
                     $supervisor->delete();   
                     return redirect("/listadoO")->with('exito','Los datos fueron modificados exitosamente');   
                }
                else{
                    $supervisor->save();
                    return redirect("/listadoS")->with('exito','Los datos fueron modificados exitosamente');

                }


           
            
        }
        else if ($user->type=='OPE'){
            $operator=Operator::findOrfail($id);
            $operator->name=$request->name;
            $operator->lastname=$request->lastname;
            $operator->username=$request->username;
            $operator->position=$request->position;

            if( $operator->position=='supervisor'){
                $sup= new Supervisor;
                $sup->id=$operator->id;
                $sup->password=$operator->password;
                $sup->name=$request->name;
                $sup->lastname=$request->lastname;
                $sup->username=$request->username;
                $sup->position=$request->position;
                $sup->attemps=0;
                $getCode=explode("-",$operator->code);
                $newCode='SUP-'.$getCode[1]."-".$getCode[2];
                $sup->code=$newCode;   
                $sup->type='SUP';
                $sup->save(); 
                $operator->delete();      
                return redirect("/listadoS")->with('exito','Los datos fueron modificados exitosamente');;  
           }
           else{
                $operator->save();
                return redirect("/listadoO")->with('exito','Los datos fueron modificados exitosamente');;  
            }
            
        }


    }




}
