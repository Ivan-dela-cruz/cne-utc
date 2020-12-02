<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="index.html"><img height="300" src="{{asset('assets/images/logo.png')}}" alt=""></a>
        </div>


        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a class="add-list" href="{{ url('/home') }}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                @else
                    <a href="{{ route('login') }}" class="add-list">Login<span><i
                                class="fa a-sign-in"></i></span></a>
                @endauth
            </div>
        @endif


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
                        <a href="blog.html">Resultados</a>
                    </li>
                    <li>
                        <a href="blog.html">Votos</a>
                    </li>

                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
