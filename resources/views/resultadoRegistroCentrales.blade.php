
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Registro Exitoso</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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

	<div class="container h-100">
    <br>
	<div class="container">
  <h2>Se ha registrado correctamente la central electrica</h2>
   <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Nombre descriptivo</th>
        <th>Ubicacion geografica</th>
        <th>Tipo de central</th>
        <th>Transmision KW</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cents as $cent)
        <tr>
          <td>{{$cent->descriptiveName}}</td>
          <td>{{$cent->geographicLocation}}</td>
          <td>{{$cent->centralType}}</td>
          <td>{{$cent->transmissionKW}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

	</div>
</body>
</html>