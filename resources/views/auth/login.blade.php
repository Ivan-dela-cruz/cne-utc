@extends('auth.base')

@section('content')
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div class="w3l_form">
                <div class="left_grid_info">
                    <h1>Elecciones Presidenciales</h1>
                    <p>Elije con responsabilidad el futuro está en tu manos</p>
                    <img src="{{asset('auth/images/image.jpg')}}" alt=""/>
                </div>
            </div>
            <div class="w3_info">
                <h2>Inicia sesión</h2>
                <p>Protegue tus credenciales.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label>Email</label>
                    <div class="input-group">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        <input id="email" type="email"
                               placeholder="Ingresa tu email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label>Contraseña</label>
                    <div class="input-group">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               placeholder="Ingresa tu contraseña"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="login-check">
                        <label class="checkbox">
                            <input type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <i> </i> Recordar
                        </label>
                    </div>


                    <button class="btn btn-danger btn-block" type="submit">Login</button>
                </form>

                @if (Route::has('password.request'))
                    <p class="account1">¿Olvidaste tu contraseña? <a href="{{ route('password.request') }}">Presiona
                            aquí</a></p>
                @endif

            </div>
        </div>
        <!-- //main content -->
    </div>

@endsection
