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
                            <source src="video/video.mp4" type="video/mp4">
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
                                    <a  id ="btnSelect" onclick="getSelectHiddenSectionVotes()" class="custom-scroll-link">
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
            <section class="gray-bg" id="sec2" style="display: none" >
                {!! Form::open(['url' => route('votes.store'), 'method' => 'post']) !!}
                    <input  name="enclosure_id" id="enclosure_id" type="text">
                    
                    <input  name="presi_id" id="presi_id" type="text">

                    <input  name="national_id" id="national_id" type="text">

                    <input  name="province_id" id="province_id" type="text">
                    
                    <input  name="andino_id" id="andino_id" type="text">


                    
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-edit-container add-list-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Elije tus representantes</h4>
                                </div>
                                <div class="custom-form">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline"> 
                                                        <input class="check1"  type="radio" name="gender"  checked>
                                                        <span>Masculino</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline"> 
                                                        <input type="radio" name="gender" value="Femenino">
                                                        <span>Femenino</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="meeting" class="chosen-select" >
                    
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline"> 
                                                        <input type="radio" name="type_vote" id="btnVotoBlanco" onchange="showContent()">
                                                        <span>Voto en blanco</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline"> 
                                                        <input type="radio" name="type_vote" id ="btnVotoNull" onchange="showContent()">
                                                        <span>Voto en null</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline" > 
                                                        <input type="radio" name="type_vote"  id ="btnVotoCandidate" onchange="showContentCandidates()">
                                                        <span>Elegir candidato</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="col-md-4">
                                            <button id="btnfinished" type="submit"  style="width: 100%;display:none;
                                            height: 100%;
                                            position: relative;
                                            margin-top: -5px;
                                            float: left;
                                            border-radius: 10px;
                                            border-color:#fff;
                                            font-size: 12px;
                                            text-decoration: none;
                                            background-color:red; color:#fff;" class="btn  big-btn  color-bg flat-btn btn-send-vote">Terminar ahora <i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </row>

                {!! Form::close() !!}
                    <div class="row" id ="ContentListCandidates">
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
                                        <input hidden name="candidate_id" value="{{$candidates[$i]['presi']->id}}" id="candidate_id" type="text">
                                        <div class="col-md-12">
                                            <button type="button"
                                            data-president="{{$candidates[$i]['presi']->organization->id}}"
                                            
                                            style="width: 100%; 
                                            position: relative;
                                            padding: 5px 5px;
                                            margin: 0px 10px 10px 0px;
                                            float: left;
                                            border-radius: 10px;
                                            border-color:#fff;
                                            font-size: 18px;
                                            text-decoration: none;
                                            background-color:#3EAAFD; color:#fff;" class="btn btn-block btn-danger btn_president">Votar</button>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <section id="sec2" class="gray-section">
                <div class="container">
                    <div class="section-title">
                        <h2>Asambleistas Nacionales</h2>
                        <div class="section-subtitle">Asambleistas Nacionales</div>
                        <span class="section-separator"></span>
                    
                    </div>
                </div>
                <!-- carousel -->
                <div class="list-carousel fl-wrap card-listing ">
                    <!--listing-carousel-->
                    <div class="listing-carousel  fl-wrap ">
                        <!--slick-slide-item-->
                        @foreach($organizations as $organization)
                            <div class="slick-slide-item">
                                <!-- listing-item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">

                                        <div class="geodir-category-img">
                                            <img src="{{asset($organization->url_image)}}" alt="">
                                            <div class="overlay"></div>
                                            <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <a 
                                            data-national="{{$organization->id}}"
                                            class="listing-geodir-category" 
                                            href="javascript:void();">Votar</a>

                                            <h3><a href="listing-single.html">{{$organization->name}}</a></h3>
                                            <ul>
                                                @foreach($organization->candidates->where('indent',env('POSITION_NATIONAL','AN')) as $national)
                                                   
                                                  <li>{{$national->name}} {{$national->last_name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <!-- listing-item end-->
                            </div>
                            <!--slick-slide-item end-->
                    @endforeach
                    <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->

                    </div>
                    <!--listing-carousel end-->
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                <!--  carousel end-->
            </section>
            <!-- section end -->
            <section id="sec2" class="gray-section">
                <div class="container">
                    <div class="section-title">
                        <h2>Asambleistas Provinciales</h2>
                        <div class="section-subtitle">Asambleistas Provinciales</div>
                        <span class="section-separator"></span>
                    
                    </div>
                </div>
                <!-- carousel -->
                <div class="list-carousel fl-wrap card-listing ">
                    <!--listing-carousel-->
                    <div class="listing-carousel  fl-wrap ">
                        <!--slick-slide-item-->
                        @foreach($organizations as $organization)
                            <div class="slick-slide-item">
                                <!-- listing-item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">

                                        <div class="geodir-category-img">
                                            <img src="{{asset($organization->url_image)}}" alt="">
                                            <div class="overlay"></div>
                                            <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <a class="listing-geodir-category" href="{{route('selecion')}}">Votar</a>

                                            <h3><a href="listing-single.html">{{$organization->name}}</a></h3>
                                            <ul>
                                                @foreach($organization->candidates->where('indent',env('POSITION_PROVINCE','AN')) as $national)
                                                   
                                                  <li>{{$national->name}} {{$national->last_name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <!-- listing-item end-->
                            </div>
                            <!--slick-slide-item end-->
                    @endforeach
                    <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->

                    </div>
                    <!--listing-carousel end-->
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                <!--  carousel end-->
            </section>
            <!-- section end -->
            <!-- section end -->
            <section id="sec2" class="gray-section">
                <div class="container">
                    <div class="section-title">
                        <h2>Parlamentarios Andinos</h2>
                        <div class="section-subtitle">Parlamentarios Andinos</div>
                        <span class="section-separator"></span>
                        
                    </div>
                </div>
                <!-- carousel -->
                <div class="list-carousel fl-wrap card-listing ">
                    <!--listing-carousel-->
                    <div class="listing-carousel  fl-wrap ">
                        <!--slick-slide-item-->
                        @foreach($organizations as $organization)
                            <div class="slick-slide-item">
                                <!-- listing-item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">

                                        <div class="geodir-category-img">
                                            <img src="{{asset($organization->url_image)}}" alt="">
                                            <div class="overlay"></div>
                                            <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i>
                                            </div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <a class="listing-geodir-category" href="{{route('selecion')}}">Votar</a>

                                            <h3><a href="listing-single.html">{{$organization->name}}</a></h3>
                                            <ul>
                                                @foreach($organization->candidates->where('indent',env('POSITION_PARLAMENT','AN')) as $national)
                                                   
                                                  <li>{{$national->name}} {{$national->last_name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                <!-- listing-item end-->
                            </div>
                            <!--slick-slide-item end-->
                    @endforeach
                    <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->
                        <!--slick-slide-item-->

                        <!--slick-slide-item end-->

                    </div>
                    <!--listing-carousel end-->
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                <!--  carousel end-->
            </section>
            <!-- section end -->
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

        $(document).on('click','.btn_president',function(){
            let presi = $(this).data('president');
            $('#presi_id').val(presi);

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
        
        function getSelectHiddenSectionVotes(){
            let x= document.getElementById("sec2")
            let y= document.getElementById("ContentListCandidates");
             if(x.style.display=="none"){
                x.style.display = "block";
                y.style.display = "none";
             }
        }
        function showContent() {
            element = document.getElementById("btnfinished");
            element2 = document.getElementById("ContentListCandidates");
 

            check = document.getElementById("btnVotoBlanco");
            check2  = document.getElementById("btnVotoNull");
            if (check.checked ||  check2.checked) {
                element.style.display='block';
                element2.style.display="none";
            }
            else {
                element.style.display='none';
                element2.style.display="none";
            }
        }
        function showContentCandidates() {
            element = document.getElementById("btnfinished");
            element2 = document.getElementById("ContentListCandidates");

            check = document.getElementById("btnVotoCandidate");
           
            if (check.checked) {
                element.style.display='none';
                element2.style.display="block";
            }
            else {
                element.style.display='block';
                element2.style.display="none";
            }
        }
       
       
    
      $(document).on('change','.chosen-select-canton',function(){
            let id = $(this).val(); 
            getSelectParishes(id);

      });
      $(document).on('change','.chosen-select-parish',function(){
            let id = $(this).val(); 
            getSelectEnclosure(id);
      });

      $(document).on('change','.chosen-select-enclosure',function(){
        let id = $(this).val();
        $('#enclosure_id').val(id); 
        
    });
      
     
    </script>
@endsection
