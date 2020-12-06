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
                        src="{{asset('assets/images/utc.png')}}" alt="">
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
                        <li><a href="dashboard-myprofile.html">  Mi perfil</a></li>
                        <li><a href="#">Cerrar sesión</a></li>
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
                            <div class="breadcrumbs"><a href="#">Panel</a><a
                                    href="#">Menú</a><span>Estadísticas</span></div>
                        </div>
                        <div class="row">
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
</body>
</html>
