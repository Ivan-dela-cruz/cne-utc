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
    <!--=============== css  ===============-->
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
@include('admin.init.header')
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
                            <h2>Edit profile</h2>
                            <div class="breadcrumbs"><a href="#">Home</a><a
                                    href="#">Dasboard</a><span>Edit profile</span></div>
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

            <!--section -->

            <!-- section end -->
        </div>
    </div>
    <!-- wrapper end -->
    <!--footer -->

    <!--footer end  -->
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
@include('admin.init.js')
</body>
</html>
