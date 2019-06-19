<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
    body {
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    .jumbotron, .card{
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#f5f6f6+0,dbdce2+21,b8bac6+49,dddfe3+80,f5f6f6+100;Grey+Pipe */
        background: rgb(245,246,246); /* Old browsers */
        background: -moz-linear-gradient(top,  rgba(245,246,246,1) 0%, rgba(219,220,226,1) 21%, rgba(184,186,198,1) 49%, rgba(221,223,227,1) 80%, rgba(245,246,246,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top,  rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 49%,rgba(221,223,227,1) 80%,rgba(245,246,246,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom,  rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 49%,rgba(221,223,227,1) 80%,rgba(245,246,246,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#f5f6f6',GradientType=0 ); /* IE6-9 */

    }

</style>

<body>
<header>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
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
                        

                    @else
                        <li class="nav-item dropdown">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">{{ __('Dashboard') }}</a>
                        </li>
                       

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Cerrar sesion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
</nav>
</header>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col=12 mt-2">
                <div class="jumbotron">
                    <h1 class="display-4">Bienvenido a GuriApp</h1>
                    <p class="lead">La nueva aplicación web en desarrollo, exclusiva para los empleados de la Electricidad de Caracas, en la cual podrán realizar con mayor facilidad sus responsabilidades dentro de la empresa  </p>
                    <hr class="my-4">
                    <p>Si ya fuiste registrado, inicia sesion aqui</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="/login" role="button">Iniciar sesión</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Instrucciones:</h5>
                        <p class="card-text">
                            Una vez te conviertes en empleado de Electricidad de Caracas deberás ser registrado por un supervisor.
                            Cuando ya estes registrado el sistema generará una clave, y el supervisor deberá entregartela junto con
                            el nombre de usuario que escogió para ti.
                            Al tener la clave y el nombre de usuario podrás Iniciar sesión con ellos.
                        </p>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
</body>