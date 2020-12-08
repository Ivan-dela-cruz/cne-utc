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
                                    <select data-placeholder="All Categories" class="chosen-select-canton">
                                
                                        @foreach($cantons as $canton)
                                            <option value="{{$canton->id}}">{{$canton->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="main-search-input-item">
                                    <select  data-placeholder="All Categories" class="chosen-select-parish">
                                            @include('web.selects.parishes')
                                    </select>
                                </div>
         
                                <div class="main-search-input-item">
                                    <select data-placeholder="All Categories" class="chosen-select-enclosure">
                                    
                                     @include('web.selects.enclosures')
                                    </select>
                               </div>
                            
                                <button class="main-search-button">
                                    <a href="#sec2" class="custom-scroll-link">
                                       <i style="color: #fff;" class="fa fa-handshake-o fa-2x"></i>
                                       </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bubble-bg"></div>
                <div class="header-sec-link">
                   
                </div>
            </section>
            <section class="gray-bg" id="sec2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="listsearch-header fl-wrap">
                                <h3>Candidatos presidenciales</h3>
                                <div class="listing-view-layout">
                                    <ul>
                                        <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                        <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-main-wrap fl-wrap card-listing row ">
                                @for($i = 0; $i< count($candidates); $i++)
                                <div class="col-md-4">
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img style="height: 200px;"
                                                     src="{{$candidates[$i]['presi']->url_image}}" alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                               
                                                <div class="listing-avatar"><a href="author-single.html"><img
                                                          
                                                            src="{{$candidates[$i]['presi']->organization->url_image}}"
                                                            alt=""></a>
                                                    <span
                                                        class="avatar-tooltip"><strong>{{$candidates[$i]['presi']->organization->name}}</strong></span>
                                                </div>
                                                <h4>
                                                    <a href="listing-single.html">{{$candidates[$i]['presi']->name}} {{$candidates[$i]['presi']->last_name}}
                                                        (PRESIDENTE) </a>
                                                </h4>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img style="height: 200px;" src="{{$candidates[$i]['vice']->url_image}}"
                                                     alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                
                                                <div class="listing-avatar"><a href="author-single.html"><img
                                                        
                                                            src="{{$candidates[$i]['vice']->organization->url_image}}"
                                                            alt=""></a>
                                                    <span
                                                        class="avatar-tooltip"><strong>{{$candidates[$i]['vice']->organization->name}}</strong></span>
                                                </div>
                                                <h4>
                                                    <a href="listing-single.html">{{$candidates[$i]['vice']->name}} {{$candidates[$i]['vice']->last_name}}
                                                        (VICEPRESIDENTE)</a>
                                                </h4>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" style="width: 100%; 
                                            position: relative;
                                            padding: 5px 5px;
                                            margin: 0px 10px 10px 0px;
                                            float: left;
                                            border-radius: 10px;
                                            border-color:#fff;
                                            font-size: 18px;
                                            text-decoration: none;
                                            background-color:#3EAAFD; color:#fff;" class="btn btn-block btn-danger">Votar</button>
                                        </div>
                                    </div>
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
        $(document).ready(function(){
           $('.chosen-select-parish').niceSelect();
           $('.chosen-select-enclosure').niceSelect();
           $('.chosen-select-canton').niceSelect();
           
        });

        function getSelectParishes(id){
           
            let url ='select-parishes/'+id;
            axios.get(url).then(function(response){
                    $('.chosen-select-parish').empty();
                    $('.chosen-select-parish').html(response.data.view);
                    $('.chosen-select-parish').niceSelect('update');
                    getSelectEnclosure(response.data.location_id);
            });
        }
        function getSelectEnclosure(id){
            let url ='select-enclosures/'+id;
            axios.get(url).then(function(response){
                    $('.chosen-select-enclosure').empty();
                    $('.chosen-select-enclosure').html(response.data);
                    $('.chosen-select-enclosure').niceSelect('update');
            });
        }

      $(document).on('change','.chosen-select-canton',function(){
            let id = $(this).val(); 
            getSelectParishes(id);

      });
      $(document).on('change','.chosen-select-parish',function(){
            let id = $(this).val(); 
            getSelectEnclosure(id);
      });
     
    </script>
@endsection
