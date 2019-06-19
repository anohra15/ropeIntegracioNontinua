@extends('layouts.app')

@section('content')
<div class="container">
<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="usuario">
                            @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="contraseña">
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar Sesion</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                ¿Olvidaste tu contraseña?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</div>

@endsection
