<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Asociación</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        function solonumeros(e){
          key=e.keyCode || e.which;
          teclado=String.fromCharCode(key);
          numero="0123456789";
          especiales="8-37-38-46";
          teclado_especial=false

          for (var i in especiales){
            if(key==especiales[i]){
              teclado_especial=true;
            }
          }

          if(numero.indexOf(teclado)==-1 && !teclado_especial){
            return false;
          }
        }
    </script>

    <style type="text/css">
    html,body{
    height: 100%;
    margin: 0;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(149,199,20,1) 0%, rgba(0,212,255,1) 96%);

}

.myForm{
background-color: rgba(0,0,0,0.5) !important;
padding: 15px !important;
border-radius: 15px !important;
color: white;

}

input{
border-radius:0 15px 15px 0 !important;

}
input:focus{
outline: none;
box-shadow:none !important;
border:1px solid #ccc !important;

}

.br-15{
border-radius: 15px 0 0 15px !important;
}

#add_more{
color: white !important;
background-color: #fa8231 !important;
border-radius: 15px !important;
border: 0 !important;

}
#remove_more{
color: white !important;
background-color: #fc5c65 !important;
border-radius: 15px !important;
border: 0 !important;
display: none;

}

.submit_btn{
border-radius: 15px !important;
background-color: #95c714 !important;
border: 0 !important;
} 
    </style>
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



<form method="POST" name="formulario" action="{{url('realizarAsociancion')}}">
	{{csrf_field()}}
	<div class="container h-100">
    <br>
	<div class="container">

  @if($tipoAsocia=="C.termoelectrica->C.distribucion")
  <h1>C.termoelectrica</h1>
   <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Nombre descriptivo</th>
        <th>Ubicación geografica</th>
        <th>Seleccion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centrales Termoeléctricas")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorT" value=[1,{{$cent->geographicLocation}}]>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>
    <div class="input-group">
     Cantidad de KW:&nbsp;<input type="text" name="transmisionKW" onkeypress="return solonumeros(event)" placeholder="cantidad KW" class="form-control" required autocomplete="transmisionKW"/>
    </div>

    <br>
    <br>
    <br>
    <br>
    
    
    <h1>C.distribucion</h1>
    <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centros de Distribución")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorD" value=[1,{{$cent->geographicLocation}}>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>

@elseif($tipoAsocia=="C.Generacion->C.distribucion")
<h1>C.Generacion</h1>
   <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th></tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centrales de Generación")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorG" value=[2,{{$cent->geographicLocation}}]>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>  
    <div class="input-group">
    Cantidad de KW:&nbsp;<input type="text" name="transmisionKW" onkeypress="return solonumeros(event)" placeholder="cantidad KW" class="form-control" required autocomplete="transmisionKW"/>
    </div>

    <br>
    <br>
    <br>
    <br>
    <table class="table table-dark table-hover">
    <h1>C.distribucion</h1>
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th></tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centros de Distribución")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorD" value=[2,{{$cent->geographicLocation}}>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>



@elseif($tipoAsocia=="C.Generacion->C.termoelectrica->C.distribucion")


<h1>C.Generacion</h1>
   <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th></tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centrales de Generación")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorG" value=[3,{{$cent->geographicLocation}}>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>
    <div class="input-group">
    Cantidad de KW:&nbsp;<input type="text" name="transmisionKW" onkeypress="return solonumeros(event)" placeholder="cantidad KW" class="form-control" required autocomplete="transmisionKW"/>
    </div>

    <br>
    <br>
    <br>
    <br>

<h1>C.termoelectrica</h1>
   <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th> </tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centrales Termoeléctricas")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorT" value=[3,{{$cent->geographicLocation}}]>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>
    <div class="input-group">
    Cantidad de KW:&nbsp;<input type="text" name="transmisionKW" onkeypress="return solonumeros(event)" placeholder="cantidad KW" class="form-control" required autocomplete="transmisionKW"/>
    </div>

    <br>
    <br>
    <br>
    <br>

    <h1>C.distribucion</h1>
    <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th></tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centros de Distribución")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorD" value=[3,{{$cent->geographicLocation}}]>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>
    


@elseif($tipoAsocia=="C.distribucion->C.distribucion")
<h1>C.distribucion</h1>
    <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centros de Distribución")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorD1" value=[4,{{$cent->geographicLocation}}]>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>
    <div class="input-group">
    Cantidad de KW:&nbsp;<input type="text" name="transmisionKW" onkeypress="return solonumeros(event)" placeholder="cantidad KW" class="form-control" required autocomplete="transmisionKW"/>
    </div>

        <br>
        <br>
        <br>
        <br>
    <h1>C.distribucion</h1>
    <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Nombre descriptivo</th>
      <th>Ubicación geografica</th>
      <th>Seleccion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cen as $cent)
        <tr>
            @if(($cent->centralType)=="Centros de Distribución")
                <td>
                    {{$cent->descriptiveName}}
                </td>
                <td>
                    {{$cent->geographicLocation}}
                </td>
                <td>
                    <input type="radio" name="asociadorD2" value=[4,{{$cent->geographicLocation}}>
                </td>
            @endif
        </tr>
      @endforeach
    </tbody>
    </table>
@endif
</div>
<br>						
	</div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <button type="submit" name="btn" class="btn btn-primary">Asociar</button>
    </form>
    <script>
        /*(function(){
          var formulario= document.getElementsByName("formulario")[0],
              elementos=formulario.elements,
              bot
        }())*/
</script>
</body>
</html>