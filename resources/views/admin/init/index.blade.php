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
            <div class="limit-box fl-wrap"></div>
            <!--section -->
            <section class="gradient-bg">
                <div class="cirle-bg">
                    <div class="bg" data-bg="images/bg/circle.png"></div>
                </div>
                <div class="container">
                    <div class="join-wrap fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Do You Have Questions ?</h3>
                                <p>Lorem ipsum dolor sit amet, harum dolor nec in, usu molestiae at no.</p>
                            </div>
                            <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i
                                        class="fa fa-envelope-o"></i></a></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
        </div>
    </div>
    <!-- wrapper end -->
    <!--footer -->
    <footer class="main-footer dark-footer  ">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <h3>About Us</h3>
                        <div class="footer-contacts-widget fl-wrap">
                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla
                                eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit, sed diam. </p>
                            <ul class="footer-contacts fl-wrap">
                                <li><span><i class="fa fa-envelope-o"></i> Mail :</span><a href="#" target="_blank">yourmail@domain.com</a>
                                </li>
                                <li><span><i class="fa fa-map-marker"></i> Adress :</span><a href="#" target="_blank">USA
                                        27TH Brooklyn NY</a></li>
                                <li><span><i class="fa fa-phone"></i> Phone :</span><a href="#">+7(111)123456789</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <h3>Our Last News</h3>
                        <div class="widget-posts fl-wrap">
                            <ul>
                                <li class="clearfix">
                                    <a href="#" class="widget-posts-img"><img src="images/all/1.jpg" class="respimg"
                                                                              alt=""></a>
                                    <div class="widget-posts-descr">
                                        <a href="#" title="">Vivamus dapibus rutrum</a>
                                        <span class="widget-posts-date"> 21 Mar 09.05 </span>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <a href="#" class="widget-posts-img"><img src="images/all/1.jpg" class="respimg"
                                                                              alt=""></a>
                                    <div class="widget-posts-descr">
                                        <a href="#" title=""> In hac habitasse platea</a>
                                        <span class="widget-posts-date"> 7 Mar 18.21 </span>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <a href="#" class="widget-posts-img"><img src="images/all/1.jpg" class="respimg"
                                                                              alt=""></a>
                                    <div class="widget-posts-descr">
                                        <a href="#" title="">Tortor tempor in porta</a>
                                        <span class="widget-posts-date"> 7 Mar 16.42 </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <h3>Our Twitter</h3>
                        <div id="footer-twiit"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <h3>Subscribe</h3>
                        <div class="subscribe-widget fl-wrap">
                            <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll
                                send you a notification by email.</p>
                            <div class="subcribe-form">
                                <form id="subscribe">
                                    <input class="enteremail" name="email" id="subscribe-email" placeholder="Email"
                                           spellcheck="false" type="text">
                                    <button type="submit" id="subscribe-button" class="subscribe-button"><i
                                            class="fa fa-rss"></i> Subscribe
                                    </button>
                                    <label for="subscribe-email" class="subscribe-message"></label>
                                </form>
                            </div>
                        </div>
                        <div class="footer-widget fl-wrap">
                            <div class="footer-menu fl-wrap">
                                <ul>
                                    <li><a href="#">Home </a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Listing</a></li>
                                    <li><a href="#">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer fl-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="about-widget">
                            <img src="images/logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright"> &#169; Speech 2017 . All rights reserved.</div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-chrome"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end  -->
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
@include('admin.init.js')
</body>
</html>
