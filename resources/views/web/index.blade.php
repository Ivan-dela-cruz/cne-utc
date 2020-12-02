@extends('web.init.index')
@section('title','Home')

@section('content')
    <div id="wrapper">
        <!-- Content-->
        <div class="content">
            <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                <div class="media-container video-parallax" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg mob-bg" style="background-image: url(images/bg/1.jpg)"></div>
                    <div class="video-container">
                        <video controls autoplay  loop muted  class="bgvid">
                            <source src="video/videoweb.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="overlay"></div>
                <div class="hero-section-wrap fl-wrap">
                    <div class="container">
                        <div class="intro-item fl-wrap">
                            <h2>Elecciones presidenciales 2021</h2>
                            <h3>Ejerce tu derecho al voto con responsabilidad.</h3>
                        </div>
                        <div class="main-search-input-wrap">
                            <div class="main-search-input fl-wrap">
                                <div class="main-search-input-item">
                                    <select data-placeholder="All Categories" class="chosen-select">
                                        <option>Selecciona un cantón</option>
                                        <option>Latacunga</option>
                                        <option>Pujíli</option>
                                        <option>Salcedo</option>
                                        <option>Mulalo</option>
                                        <option>Guaytacama</option>
                                    </select>
                                </div>
                                <div class="main-search-input-item">
                                    <select data-placeholder="All Categories" class="chosen-select">
                                        <option>Selecciona una parroquia</option>
                                        <option>Bellavista</option>
                                        <option>El Salto</option>
                                        <option>San Felipe</option>
                                    </select>
                                </div>
                                <div class="main-search-input-item">
                                    <select data-placeholder="All Categories" class="chosen-select">
                                        <option>Selecciona un recinto</option>
                                        <option>Recinto 1</option>
                                        <option>Recinto 2</option>
                                        <option>Recinto 3</option>
                                        <option>Recinto 4</option>
                                        <option>Recinto 5</option>
                                    </select>
                                </div>
                                <button class="main-search-button"
                                        onclick="window.location.href='listings-half-screen-map-list.html'">Resultados
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bubble-bg"> </div>
                <div class="header-sec-link">
                    <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
                </div>
            </section>
            <!--section -->
            <section id="sec2" class="gray-section">
                <div class="container">
                    <div class="section-title">
                        <h2>Cargos a elejir</h2>
                        <div class="section-subtitle">Elje con responsabilidad</div>
                        <span class="section-separator"></span>
                        <p>No votes por Lasso y caorrea.</p>
                    </div>
                </div>
                <!-- carousel -->
                <div class="list-carousel fl-wrap card-listing ">
                    <!--listing-carousel-->
                    <div class="listing-carousel  fl-wrap ">
                        <!--slick-slide-item-->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src="{{asset('assets/images/all/1.jpg')}}" alt="">
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <a class="listing-geodir-category" href="listing.html">Retail</a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                                        </div>
                                        <h3><a href="listing-single.html">Event in City Mol</a></h3>
                                        <p>Sed interdum metus at nisi tempor laoreet. </p>
                                        <div class="geodir-category-options fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                                <span>(7 reviews)</span>
                                            </div>
                                            <div class="geodir-category-location"><a href="#"><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn
                                                    New York, NY 10065</a></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src="{{asset('assets/images/all/1.jpg')}}" alt="">
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>15</span><i class="fa fa-heart"></i></div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <a class="listing-geodir-category" href="listing.html">Event</a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By  <strong>Mark Rose</strong></span>
                                        </div>
                                        <h3><a href="listing-single.html">Cafe "Lollipop"</a></h3>
                                        <p>Morbi suscipit erat in diam bibendum rutrum in nisl.</p>
                                        <div class="geodir-category-options fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                                <span>(17 reviews)</span>
                                            </div>
                                            <div class="geodir-category-location"><a href="#"><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn
                                                    New York, NY 10065</a></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src="{{asset('assets/images/all/1.jpg')}}" alt="">
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>13</span><i class="fa fa-heart"></i></div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <a class="listing-geodir-category" href="listing.html">Gym </a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By  <strong>Nasty Wood</strong></span>
                                        </div>
                                        <h3><a href="listing-single.html">Gym In Brooklyn</a></h3>
                                        <p>Morbiaccumsan ipsum velit tincidunt . </p>
                                        <div class="geodir-category-options fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="3">
                                                <span>(16 reviews)</span>
                                            </div>
                                            <div class="geodir-category-location"><a href="#"><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn
                                                    New York, NY 10065</a></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->
                        <div class="slick-slide-item">
                            <!-- listing-item -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src="{{asset('assets/images/all/1.jpg')}}" alt="">
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>3</span><i class="fa fa-heart"></i></div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <a class="listing-geodir-category" href="listing.html">Shops</a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/1.jpg" alt=""></a>
                                            <span class="avatar-tooltip">Added By  <strong>Nasty Wood</strong></span>
                                        </div>
                                        <h3><a href="listing-single.html">Shop in Boutique Zone</a></h3>
                                        <p>Morbiaccumsan ipsum velit tincidunt . </p>
                                        <div class="geodir-category-options fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                                <span>(6 reviews)</span>
                                            </div>
                                            <div class="geodir-category-location"><a href="#"><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn
                                                    New York, NY 10065</a></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        </div>
                        <!--slick-slide-item end-->

                    </div>
                    <!--listing-carousel end-->
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                <!--  carousel end-->
            </section>
            <!-- section end -->

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
        <!-- Content end -->
    </div>
@endsection


