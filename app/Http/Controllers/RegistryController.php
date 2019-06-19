<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\UserModel;
use App\Supervisor;
use App\Operator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class RegistryController extends Controller
{
    
    public function registro(){
        return view('regitroEmpleado');
    }
    public function registroFallido(){
        return view('regitroEmpleado');
    }
    public function generarContraseña(){
        $opc_letras = TRUE; //  FALSE para quitar las letras
        $opc_numeros = TRUE; // FALSE para quitar los números
        $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
        $opc_especiales = TRUE; // FALSE para quitar los caracteres especiales
        $longitud = 9;
        $password = "";
        $DesdeLetraM = "A";
        $HastaLetraM = "Z";
        $letrasM="ABCDEFGHIJKLMNOPQRSTUVXYZ";
        $letras ="abcdefghijklmnopqrstuvwxyz";
        $numeros = "1234567890";
        $especiales ="|@#~$%()=^*+[]{}-_";
        $listado = "";
        if($opc_letrasMayus == TRUE) {
            $listado .=chr(rand(ord($DesdeLetraM),ord($HastaLetraM))); 
        }
        if($opc_especiales == TRUE) {
            $listado .= $especiales[rand(0,(strlen($especiales)-1))];
        }
        if (($opc_letras == TRUE)and($opc_numeros==TRUE)){
            $generico=$numeros.$letras;
            $i=1;
            while($i<=6){
                $listado .= $generico[rand(0,(strlen($generico)-1))];
                $i++;
            }
        }
        
        return $listado;
}
    public function codeHEX(){
        $letrasM="ABCDEF";
        $numeros = "1234567890";
        $listado = "";
        $codeHEX="";
        $listado .=$letrasM.$numeros;
        $i=0;
        while($i<6){
            $codeHEX .=$listado[rand(0,(strlen($listado)-1))];
            $i=$i+1;
        }
        return $codeHEX;
    }
    public function registrar(Request $req){
        if($req->cargo=="SUP"){
            $rules = [
                'nombre'=>'required|regex:/^[a-zA-Z]+$/|max:50',
                'apellido'=>'required|regex:/^[a-zA-Z]+$/|max:50',
                'username'=>'required|max:12',
            ];
            $mensajes = [
                'nombre.required'=>'Es necesario que se complete el campo nombre',
                'nombre.regex'=>'Solo se permiten letras de la a-z en el campo nombre',
                'nombre.max'=>'La longitud del nombre debe ser menor a 50 caracteres',
                'apellido.required'=>'Es necesario que se complete el campo apellido',
                'apellido.regex'=>'Solo se permiten letras de la a-z en el campo apellido',
                'apellido.max'=>'La longitud del apellido debe ser menor a 50 caracteres',
                'username.required'=>'Es necesario que se complete el campo nombre de usuario',
                'username.max'=>'Solo se permite un maximo de 12 caracteres en el campo nombre de usuario',
            ];
            $this->validate($req, $rules, $mensajes);
            $users = DB::table('users')->get();
            $contraG=$this->generarContraseña();
            $sup=new Supervisor;
            $sup->username=$req->username;
            $sup->password=Hash::make($contraG);
            $sup->name=$req->nombre;
            $sup->lastname=$req->apellido;
            $sup->type=$req->cargo;
            $sup->code=0;
            $sup->position="supervisor";
            $repeticion=0;
            foreach ($users as $user) {
                if(($user->username)==$req->username){
                    $repeticion=1;
                    break;
                }else{
                    $repeticion=0;
                }
            }
            if($repeticion==0){
                $sup->save();
            $sup->username=$req->username;
            $sup->password=Hash::make($contraG);
            $sup->name=$req->nombre;
            $sup->lastname=$req->apellido;
            $sup->type=$req->cargo;
            $sup->code=$sup->type."-".$sup->id."-".$this->codeHEX();
            $sup->save();
            return view('resultadoRegistro',[
                'NU'=>$req->username,
                'contra'=>$contraG,
                'S'=>"activo",
                'CH'=>$sup->code,
                'id'=>$sup->id,
                'TE'=>$sup->type,
                'N'=>$req->nombre,
                'A'=>$req->apellido,
                'cargo'=>$sup->type,
                'I'=>"0"
                ]);
            }
                
            }else if($req->cargo=="OPE"){
                $rules = [
                    'nombre'=>'required|regex:/^[a-zA-Z]+$/|max:50',
                    'apellido'=>'required|regex:/^[a-zA-Z]+$/|max:50',
                    'username'=>'required|max:12',
                ];
                $mensajes = [
                    'nombre.required'=>'Es necesario que se complete el campo nombre',
                    'nombre.regex'=>'Solo se permiten letras de la a-z en el campo nombre',
                    'nombre.max'=>'La longitud del nombre debe ser menor a 50 caracteres',
                    'apellido.required'=>'Es necesario que se complete el campo apellido',
                    'apellido.regex'=>'Solo se permiten letras de la a-z en el campo apellido',
                    'apellido.max'=>'La longitud del apellido debe ser menor a 50 caracteres',
                    'username.required'=>'Es necesario que se complete el campo nombre de usuario',
                    'username.max'=>'Solo se permite un maximo de 12 caracteres en el campo nombre de usuario',
                ]; 
                $this->validate($req, $rules, $mensajes);
                $users = DB::table('users')->get();
                $contraG=$this->generarContraseña();
                $ope=new Operator;
                $ope->username=$req->username;
                $ope->password=Hash::make($contraG);
                $ope->name=$req->nombre;
                $ope->lastname=$req->apellido;
                $ope->type=$req->cargo;
                $ope->code=0;
                $ope->position="operador";
                $repeticion=0;
                foreach ($users as $user) {
                    if(($user->username)==$req->username){
                        $repeticion=1;
                        break;
                    }else{
                        $repeticion=0;
                    }
                }
                if($repeticion==0){
                    $ope->save();
                $ope->username=$req->username;
                $ope->password=Hash::make($contraG);
                $ope->name=$req->nombre;
                $ope->lastname=$req->apellido;
                $ope->type=$req->cargo;
                    $ope->code=$ope->type."-".$ope->id."-".$this->codeHEX();
                    $ope->save();
                return view('resultadoRegistro',[
                    'NU'=>$req->username,
                    'contra'=>$contraG,
                    'S'=>"activo",
                    'CH'=>$ope->code,
                    'id'=>$ope->id,
                    'TE'=>$ope->type,
                    'N'=>$req->nombre,
                    'A'=>$req->apellido,
                    'cargo'=>$ope->type,
                    'I'=>"0"
                    ]);
                }
        }
    }
}