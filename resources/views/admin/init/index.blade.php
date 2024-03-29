<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    @include('admin.init.css')
    @yield('css')
</head>
<body>
<!-- loader -->
<div class="loader-wrap">
    <div class="pin"></div>
    <div class="pulse"></div>
</div>
<!--  loader end -->
<!-- Main   -->
<div id="main">
    <!-- header  -->
    <header class="main-header dark-header fs-header sticky">
        <div class="header-inner">
            <div class="logo-holder">
                <a style="color: white; font-size: 20px;" href="{{route('admin')}}"><img
                        src="{{asset('assets/images/logo.png')}}" alt="">
                    <b> Elecciones 2021</b> </a>
            </div>

            <div class="header-user-menu">
                @guest()
                    <div class="header-user-name">
                        USER NOT FOUT
                    </div>
                @else
                    <div class="header-user-name">
                        <span><img src="{{asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt=""></span>
                        Hola, {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </div>
                    <ul>
                        <li><a href="{{route('profile')}}"> Mi perfil</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Cerrar sesión</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                @endguest

            </div>
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
                        {{----
                        <li>
                            <a href="blog.html">News</a>
                        </li>
                        ----}}
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
        </div>
    </header>
    <!--  header end -->
    <!-- wrapper -->
    <div id="wrapper">
        <!--content -->
        <div class="content">
            <!--section -->
            <section>
                <!-- container -->
                <div class="container">
                    <!-- profile-edit-wrap -->
                    <div class="profile-edit-wrap">
                        <div class="profile-edit-page-header">
                            <h2>Panel de Control</h2>
                            @yield('position')
                        </div>
                       
                        <div class="row panel-height">
                            @include('admin.init.sidebar')
                            @yield('content')
                        </div>
                    </div>
                    <!--profile-edit-wrap end -->
                </div>
                <!--container end -->
            </section>
            <!-- section end -->
            <div class="limit-box fl-wrap"></div>
            <!--section -->

            <!-- section end -->
        </div>
    </div>
    <!-- wrapper end -->
   
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->

@include('admin.init.js')
@yield('scripts')
</body>
</html>
