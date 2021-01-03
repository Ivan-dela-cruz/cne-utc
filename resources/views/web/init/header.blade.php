<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="header-inner">
            <div class="logo-holder">
                <a style="color: white; font-size: 20px;" href="{{url('/')}}"><img
                        src="{{asset('assets/images/logo.png')}}" alt="">
                    <b> Elecciones 2021</b> </a>
            </div>

                @guest()
            
                
                @else
                <div class="header-user-menu">
                    <div class="header-user-name">
                        <span><img src="{{asset('assets/images/avatar/avatar-bg.png')}}" alt=""></span>
                        Hola, {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </div>
                    <ul>
                        <li><a href="dashboard-myprofile.html"> Mi perfil</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Cerrar sesión</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                      </div>
                @endguest

          
           

        <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="{{route('results')}}">Resultados</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
        </div>
</header>
