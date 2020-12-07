@extends('web.init.index')
@section('title','Home')

@section('content')
    <div id="wrapper">
        <!-- Content-->
        <div class="content">
            <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                <div class="media-container video-parallax" data-scrollax="properties: { translateY: '200px' }">
                    <div class="bg mob-bg" style="background-image: url(images/1.jpg)"></div>
                    <div class="video-container">
                        <video controls autoplay loop muted class="bgvid">
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
                                        <option>Selecciona una cantón</option>
                                        @foreach($cantons as $canton)
                                            <option value="{{$canton->id}}">{{$canton->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="main-search-input-item">
                                    <select data-placeholder="All Categories" class="chosen-select">
                                        <option>Selecciona una parroquia</option>
                                        @foreach($parishes as $parish)
                                            <option value="{{$parish->id}}">{{$parish->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="main-search-input-item">
                                    <select data-placeholder="All Categories" class="chosen-select">
                                        <option>Selecciona un recinto</option>
                                        @foreach($enclosures as $enclosure)
                                            <option value="{{$enclosure->id}}">{{$enclosure->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="main-search-button"
                                        onclick="window.location.href='{{route('maps')}}'">Resultados
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bubble-bg"></div>
                <div class="header-sec-link">
                    <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
                </div>
            </section>
            <section class="gray-bg" id="sec1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="listsearch-header fl-wrap">
                                <h3>Candidatos prsidenciales</h3>
                                <div class="listing-view-layout">
                                    <ul>
                                        <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                        <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-main-wrap fl-wrap card-listing ">

                                @for($i = 0; $i< count($candidates); $i++)
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img style="height: 350px;"
                                                     src="{{$candidates[$i]['presi']->url_image}}" alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category"
                                                   href="listing.html">{{$candidates[$i]['presi']->organization->acronym}}</a>
                                                <div class="listing-avatar"><a href="author-single.html"><img
                                                            style="height: 75px; width: 75px;"
                                                            src="{{$candidates[$i]['presi']->organization->url_image}}"
                                                            alt=""></a>
                                                    <span
                                                        class="avatar-tooltip"><strong>{{$candidates[$i]['presi']->organization->name}}</strong></span>
                                                </div>
                                                <h3>
                                                    <a href="listing-single.html">{{$candidates[$i]['presi']->name}} {{$candidates[$i]['presi']->last_name}}
                                                        (PRESIDENTE) </a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img style="height: 350px;" src="{{$candidates[$i]['vice']->url_image}}"
                                                     alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category"
                                                   href="listing.html">{{$candidates[$i]['vice']->organization->acronym}}</a>
                                                <div class="listing-avatar"><a href="author-single.html"><img
                                                            style="height: 75px; width: 75px;"
                                                            src="{{$candidates[$i]['vice']->organization->url_image}}"
                                                            alt=""></a>
                                                    <span
                                                        class="avatar-tooltip"><strong>{{$candidates[$i]['vice']->organization->name}}</strong></span>
                                                </div>
                                                <h3>
                                                    <a href="listing-single.html">{{$candidates[$i]['vice']->name}} {{$candidates[$i]['vice']->last_name}}
                                                        (VICEPRESIDENTE)</a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <!--box-widget-wrap -->
                        <div class="col-md-4">
                            <div class="fl-wrap">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>User Contacts : </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-contacts list-item-widget-contacts">
                                                <ul>
                                                    <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a
                                                            href="#">USA 27TH Brooklyn NY</a></li>
                                                    <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a>
                                                    </li>
                                                    <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a
                                                            href="#">AlisaNoory@domain.com</a></li>
                                                    <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">themeforest.net</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="list-widget-social">
                                                <ul>
                                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-vk"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Get in Touch : </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-content">
                                            <form id="add-comment" class="add-comment custom-form">
                                                <fieldset>
                                                    <label><i class="fa fa-user-o"></i></label>
                                                    <input type="text" placeholder="Your Name *" value=""/>
                                                    <div class="clearfix"></div>
                                                    <label><i class="fa fa-envelope-o"></i> </label>
                                                    <input type="text" placeholder="Email Address*" value=""/>
                                                    <textarea cols="40" rows="3" placeholder="Your message:"></textarea>
                                                </fieldset>
                                                <button class="btn  big-btn  color-bg flat-btn">Send Message<i
                                                        class="fa fa-angle-right"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                        <!--box-widget-wrap end-->
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/locations.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection
