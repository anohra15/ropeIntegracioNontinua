@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row text-center">
        <div class="col-12">
            <h2 class="mt-5 mb-5">MODIFICAR DATOS DE USUARIO</h2>
        </div>
    </div>

    @if($user->type==='SUP')
        <div class="container">
                <div class="main">
                    <div class="main-center">                     
                        <form class="" method="POST" action="{{ url('modificarDatos') }}/{{$supervisor->id}}">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                    
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" required autocomplete="name" value={{$supervisor->name}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="lastname" required autocomplete="lastname" value={{$supervisor->lastname}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username"  required autocomplete="lastname" value={{$supervisor->username}}>
                                    </div>
                            </div>

                            
                            <label for="position">Cargo</label> 
                            <div class="input-group mt-3">
                                <select class="form-control" name="position">
                                    <option>supervisor</option>
                                    <option>operador</option>
                                </select>
						    </div>

                            <hr>
                            <div class="trans">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            
                            
                        </form>
                    </div><!--main-center"-->
                </div><!--main-->
            </div><!--container-->
        
    @elseif($user->type==='OPE')
        <div class="container">
                <div class="main">
                    <div class="main-center">                     
                        <form class="" method="POST" action="{{ url('modificarDatos') }}/{{$operator->id}}">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                    
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name"  value={{$operator->name}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="lastname" value={{$operator->lastname}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" value={{$operator->username}}>
                                    </div>
                            </div>

                            <label for="position">Cargo</label> 
                            <div class="input-group mt-3">
                                <select class="form-control" name="position">
                                    <option>operador</option>
                                    <option>supervisor</option>
                                </select>
						    </div>

                            <hr>
                            <div class="trans">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
   
                            
                            
                            
                        </form>
                    </div><!--main-center"-->
                </div><!--main-->
            </div><!--container-->


    @endif

    @endsection