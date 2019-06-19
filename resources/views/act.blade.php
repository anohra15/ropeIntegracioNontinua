<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Actualizar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">
                GuriApp
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mlz-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Inicio') }}</a>
                        </li>

                    @else
                        <li class="nav-item dropdown">
                        <li class="nav-item">
                            <a class="nav-link" href="/home2">{{ __('Dashboard') }}</a>
                        
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
                <div class="main">
                    <div class="main-center">                     
                        <form class="" method="POST" action="{{ url('actualizarDatos') }}/{{$operator->id}}">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                    
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" id="name" required autocomplete="name" value={{$operator->name}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Apellido</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="lastname" required autocomplete="lastname" value={{$operator->lastname}} re>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" required autocomplete="username" value={{$operator->username}}>
                                    </div>
                            </div>
                            <hr>
                            <div class="trans">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
   
                            
                            
                            
                        </form>
                    </div><!--main-center"-->
                </div><!--main-->
</div><!--container-->
</body>
</html>

