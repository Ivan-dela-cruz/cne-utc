<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Citybook -Directory Listing Template</title>
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
                <a href="index.html"><img src="images/logo.png" alt=""></a>
            </div>
            <div class="header-search vis-header-search">
                <div class="header-search-input-item">
                    <input type="text" placeholder="Keywords" value=""/>
                </div>
                <div class="header-search-select-item">
                    <select data-placeholder="All Categories" class="chosen-select">
                        <option>All Categories</option>
                        <option>Shops</option>
                        <option>Hotels</option>
                        <option>Restaurants</option>
                        <option>Fitness</option>
                        <option>Events</option>
                    </select>
                </div>
                <button class="header-search-button" onclick="window.location.href='listing.html'">Search</button>
            </div>
            <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
            <a href="dashboard-add-listing.html" class="add-list">Add Listing <span><i
                        class="fa fa-plus"></i></span></a>
            <div class="header-user-menu">
                <div class="header-user-name">
                    <span><img src="images/avatar/1.jpg" alt=""></span>
                    Hello , Alisa
                </div>
                <ul>
                    <li><a href="dashboard-myprofile.html"> Edit profile</a></li>
                    <li><a href="dashboard-add-listing.html"> Add Listing</a></li>
                    <li><a href="dashboard-bookings.html"> Bookings </a></li>
                    <li><a href="dashboard-review.html"> Reviews </a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
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
                        <li>
                            <a href="#">Home <i class="fa fa-caret-down"></i></a>
                            <!--second level -->
                            <ul>
                                <li><a href="index.html">Parallax Image</a></li>
                                <li><a href="index2.html">Video</a></li>
                                <li><a href="index3.html">Map</a></li>
                                <li><a href="index4.html">Slideshow</a></li>
                                <li><a href="index5.html">Sider</a></li>
                            </ul>
                            <!--second level end-->
                        </li>
                        <li>
                            <a href="#">Listings <i class="fa fa-caret-down"></i></a>
                            <!--second level -->
                            <ul>
                                <li><a href="listing.html">Column map</a></li>
                                <li><a href="listing2.html">Column map 2</a></li>
                                <li><a href="listing3.html">Fullwidth Map</a></li>
                                <li><a href="listing4.html">Fullwidth Map 2</a></li>
                                <li><a href="listing5.html">Without Map</a></li>
                                <li><a href="listing6.html">Without Map 2</a></li>
                                <li>
                                    <a href="#">Single <i class="fa fa-caret-down"></i></a>
                                    <!--third  level  -->
                                    <ul>
                                        <li><a href="listing-single.html">Style 1</a></li>
                                        <li><a href="listing-single2.html">Style 2</a></li>
                                        <li><a href="listing-single3.html">Style 3</a></li>
                                        <li><a href="listing-single4.html">Style 4</a></li>
                                    </ul>
                                    <!--third  level end-->
                                </li>
                            </ul>
                            <!--second level end-->
                        </li>
                        <li>
                            <a href="blog.html">News</a>
                        </li>
                        <li>
                            <a href="#" class="act-link">Pages <i class="fa fa-caret-down"></i></a>
                            <!--second level -->
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="author-single.html">User single</a></li>
                                <li><a href="how-itworks.html">How it Works</a></li>
                                <li><a href="pricing-tables.html">Pricing</a></li>
                                <li><a href="dashboard-myprofile.html">User Dasboard</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                                <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="header2.html">Header 2</a></li>
                                <li><a href="footer-fixed.html">Footer Fixed</a></li>
                            </ul>
                            <!--second level end-->
                        </li>
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
