<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Central;
use Illuminate\Routing\Redirector;
use Validator;

class CentralController extends Controller
{
    public function registro(){
        return view('registroCentral');
    }
    public function registro2(){
        return view('registroCentralR');
    }

    public function asociarC(){
        return view('asociarCentrales');
    }

    public function editandoAsociancion(){
        $cents = DB::table('central')->get();
        return view('edicionAsociacion',compact('cents'));
    }

    public function eliminarAsociancion(){
        $cents = DB::table('central')->get();
        return view('eliminarAsociacion',compact('cents'));
    }

    public function registrar(Request $req){
        $rules = [
            'nombreDescript'=>'required|regex:/^[a-zA-Z]+$/',
            'ubicacionGeogra'=>'required|regex:/^[a-zA-Z]+$/',
        ];
        $mensajes = [
            'nombreDescript.required'=>'Es necesario que se complete el campo nombre descriptivo',
            'nombreDescript.regex'=>'Solo se permiten letras de la a-z en el campo nombre descriptivo',
            'ubicacionGeogra.required'=>'Es necesario que se complete el campo ubicacion geografica',
            'ubicacionGeogra.regex'=>'Solo se permiten letras de la a-z en el campo ubicacion geografica',
        ];
        $this->validate($req, $rules, $mensajes);
        $cents = DB::table('central')->get();
        $cen=new Central;
        $cen->descriptiveName=$req->nombreDescript;
        $cen->geographicLocation=$req->ubicacionGeogra;
        $cen->centralType=$req->tipoCentral;
        $repeticion=0;
            foreach ($cents as $cent) {
                if(($cent->geographicLocation)==$req->ubicacionGeogra){
                    $repeticion=1;
                    break;
                }else{
                    $repeticion=0;
                }
            }
            if($repeticion==0){
            $cen->save();
          $cents = DB::table('central')->get();
          $repeticion=0;
          return view('resultadoRegistroCentrales',['cents'=>$cents]);
          }else{
            return redirect()->route('agregarCentrales2',['R'=>$repeticion]); 
            }
    }

    public function asociandoCentral(Request $req){
        $cents = DB::table('central')->get();
        if(($req->tipoAsocia)=="C.termoelectrica->C.distribucion"){
            return view("listasDeCentrales",['tipoAsocia'=>$req->tipoAsocia,'cen'=>$cents]);
        }else if(($req->tipoAsocia)=="C.Generacion->C.distribucion"){
            return view("listasDeCentrales",['tipoAsocia'=>$req->tipoAsocia,'cen'=>$cents]);
        }else if(($req->tipoAsocia)=="C.Generacion->C.termoelectrica->C.distribucion"){
            return view("listasDeCentrales",['tipoAsocia'=>$req->tipoAsocia,'cen'=>$cents]);
        }else if(($req->tipoAsocia)=="C.distribucion->C.distribucion"){
            return view("listasDeCentrales",['tipoAsocia'=>$req->tipoAsocia,'cen'=>$cents]);
        }
    }

    public function realizarAsociancion(Request $req){
        if((($req->asociadorT[1])==1) and (($req->asociadorD[1])==1)){

            $i=0;
            $j=0;
            $cadenaT="";
            $cadenaD="";
            while($i<(strlen($req->asociadorT))){
                if((($req->asociadorT[$i])!=1)and(($req->asociadorT[$i])!="]")and(($req->asociadorT[$i])!=",")
                and(($req->asociadorT[$i])!="[")){
                    $cadenaT .=$req->asociadorT[$i];

                }
                $i++;
            }
 
            while($j<(strlen($req->asociadorD))){
                
                if((($req->asociadorD[$j])!=1)and(($req->asociadorD[$j])!="]")and(($req->asociadorD[$j])!=",")
                and(($req->asociadorD[$j])!="[")){
                    $cadenaD .=$req->asociadorD[$j];

                }
            $j++;
            }

            $centsT = DB::table('central')->where('geographicLocation',$cadenaT)->first();
            $centsD = DB::table('central')->where('geographicLocation',$cadenaD)->first();
            $cenT=Central::find($centsT->id);
            $cenD=Central::find($centsD->id);
            $cenT->transmissionKW=(int)($req->transmisionKW);
            $cenT->associatedCentral=$cenD->id;
            $cenT->save();
            return redirect("/asociarCentrales")->with('exito3','Los centrales fueron asociadas exitosamente');   



        }else if((($req->asociadorG[1])==2) and (($req->asociadorD[1])==2)){


            $i=0;
            $j=0;
            $cadenaG="";
            $cadenaD="";
            while($i<(strlen($req->asociadorG))){
                if((($req->asociadorG[$i])!=2)and(($req->asociadorG[$i])!="]")and(($req->asociadorG[$i])!=",")
                and(($req->asociadorG[$i])!="[")){
                    $cadenaG .=$req->asociadorG[$i];

                }
                $i++;
            }
 
            while($j<(strlen($req->asociadorD))){
                
                if((($req->asociadorD[$j])!=2)and(($req->asociadorD[$j])!="]")and(($req->asociadorD[$j])!=",")
                and(($req->asociadorD[$j])!="[")){
                    $cadenaD .=$req->asociadorD[$j];

                }
            $j++;
            }

            $centsG = DB::table('central')->where('geographicLocation',$cadenaG)->first();
            $centsD = DB::table('central')->where('geographicLocation',$cadenaD)->first();
            $cenG=Central::find($centsG->id);
            $cenD=Central::find($centsD->id);
            $cenG->transmissionKW=(int)($req->transmisionKW);
            $cenG->associatedCentral=$cenD->id;
            $cenG->save();
            return redirect("/asociarCentrales")->with('exito3','Los centrales fueron asociadas exitosamente');   



            

        }else if((($req->asociadorT[1])==3) and (($req->asociadorD[1])==3) and (($req->asociadorG[1])==3)){
            
            
            $i=0;
            $j=0;
            $k=0;
            $cadenaT="";
            $cadenaD="";
            $cadenaG="";
            while($i<(strlen($req->asociadorG))){
                if((($req->asociadorG[$i])!=3)and(($req->asociadorG[$i])!="]")and(($req->asociadorG[$i])!=",")
                and(($req->asociadorG[$i])!="[")){
                    $cadenaG .=$req->asociadorG[$i];

                }
                $i++;
            }
 
            while($j<(strlen($req->asociadorD))){
                
                if((($req->asociadorD[$j])!=3)and(($req->asociadorD[$j])!="]")and(($req->asociadorD[$j])!=",")
                and(($req->asociadorD[$j])!="[")){
                    $cadenaD .=$req->asociadorD[$j];

                }
            $j++;
            }

            while($k<(strlen($req->asociadorT))){
                
                if((($req->asociadorT[$k])!=3)and(($req->asociadorT[$k])!="]")and(($req->asociadorT[$k])!=",")
                and(($req->asociadorT[$k])!="[")){
                    $cadenaT .=$req->asociadorT[$k];
                }
            $k++;
            }

            $centsG = DB::table('central')->where('geographicLocation',$cadenaG)->first();
            $centsD = DB::table('central')->where('geographicLocation',$cadenaD)->first();           
            $centsT = DB::table('central')->where('geographicLocation',$cadenaT)->first();
            $cenG=Central::find($centsG->id);
            $cenD=Central::find($centsD->id);
            $cenT=Central::find($centsT->id);

            $cenG->transmissionKW=(int)($req->transmisionKWCG);
            $cenG->associatedCentral=$cenT->id;
            $cenG->save();

            $cenT->transmissionKW=(int)($req->transmisionKWCT);
            $cenT->associatedCentral=$cenD->id;
            $cenT->save();

            return redirect("/asociarCentrales")->with('exito3','Los centrales fueron asociadas exitosamente');   



            

        }else if((($req->asociadorD1[1])==4) and (($req->asociadorD2[1])==4)){
            $i=0;
            $j=0;
            $cadenaD1="";
            $cadenaD2="";
            while($i<(strlen($req->asociadorD1))){
                if((($req->asociadorD1[$i])!=4)and(($req->asociadorD1[$i])!="]")and(($req->asociadorD1[$i])!=",")
                and(($req->asociadorD1[$i])!="[")){
                    $cadenaD1 .=$req->asociadorD1[$i];

                }
                $i++;
            }
 
            while($j<(strlen($req->asociadorD2))){
                
                if((($req->asociadorD2[$j])!=4)and(($req->asociadorD2[$j])!="]")and(($req->asociadorD2[$j])!=",")
                and(($req->asociadorD2[$j])!="[")){
                    $cadenaD2 .=$req->asociadorD2[$j];

                }
            $j++;
            }

            $centsD1 = DB::table('central')->where('geographicLocation',$cadenaD1)->first();
            $centsD2 = DB::table('central')->where('geographicLocation',$cadenaD2)->first();
            $cenD1=Central::find($centsD1->id);
            $cenD2=Central::find($centsD2->id);
            $cenD1->transmissionKW=(int)($req->transmisionKWCD);
            $cenD1->associatedCentral=$cenD2->id;
            $cenD1->save();
            return redirect("/asociarCentrales")->with('exito3','Los centrales fueron asociadas exitosamente');   
            

        }else{
            return redirect("/asociarCentrales")->with('fracaso','No selecciono centrales para asociar. Intente de nuevo');   
        }
    }

    public function realizarEdicion(Request $req){
        $i=0;
        $cadena="";
        while($i<(strlen($req->asociador))){
            if((($req->asociador[$i])!="]")and(($req->asociador[$i])!=",") 
            and(($req->asociador[$i])!="[")){
                $cadena .=$req->asociador[$i];
            }
            $i++;
            }
            $cents = DB::table('central')->where('geographicLocation',$cadena)->first();
            $cen=Central::find($cents->id);
        return view('editAsociacion',['cen'=>$cen]);
    }

    public function editar(Request $req){
        $cents = DB::table('central')->where('geographicLocation',$req->B1)->first();
        $cen=Central::find($cents->id);
        $cen->transmissionKW=$req->transmissionKW;
        $cen->save();
        return redirect("/editarAsociacion")->with('exito4','Las asociaciones fueron editadas exitosamente');   
    }

    public function realizarEliminacion(Request $req){
        $i=0;
        $cadena="";

        if($req->asociador!=NULL){
            while($i<(strlen($req->asociador))){
                if((($req->asociador[$i])!="]")and(($req->asociador[$i])!=",") 
                and(($req->asociador[$i])!="[")){
                    $cadena .=$req->asociador[$i];
                }
                $i++;
                }
                $cents = DB::table('central')->where('geographicLocation',$cadena)->first();
                $cen=Central::find($cents->id);
                $cen->transmissionKW=0;
                $cen->associatedCentral=0;
                $cen->save();
                return redirect("/eliminarAsociancion")->with('exito5','Las asociaciones fueron eliminadas exitosamente'); 
        }
        else{
            return redirect("/eliminarAsociancion")->with('error3','No selecciono ninguna central'); 
    
        }
         
    }
    
    

}