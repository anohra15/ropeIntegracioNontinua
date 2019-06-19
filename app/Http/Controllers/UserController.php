<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UserModel;
use App\Supervisor;
use App\Operator;

class UserController extends Controller
{

    public function controlInicioSesion(){
        $user=UserModle::findOrFail();
        return "hola llevas 1 intento";
    }




}
