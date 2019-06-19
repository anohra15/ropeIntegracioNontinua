<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\UserModel;
use Validator;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function index(){
        $operators= Operator::all();
        return view('listadoO',compact('operators'));
    }

    public function act($id){
       
        $user=UserModel::findOrfail($id);
        $operator=Operator::findOrfail($id);
        return view('act',compact('operator','user'));
    }

    public function actualizarDatos(Request $request, $id){

        $user=UserModel::findOrfail($id);

        if ($user->type=='OPE'){
            $operator=Operator::findOrfail($id);
            $operator->name=$request->name;
            $operator->lastname=$request->lastname;
            $operator->username=$request->username;
            $operator->save();
            return redirect("/home2")->with('exitoUp','Los datos fueron actualizados exitosamente');   
        }

    }
}
