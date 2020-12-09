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
                <form action="">

              
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
                                                        <input type="radio" name="gender">
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
                                                        <input type="radio" name="vote"  >
                                                        <span>Voto en blanco</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline"> 
                                                        <input type="radio" name="vote">
                                                        <span>Voto en null</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="add-list-media-header">
                                                        <label class="radio inline"> 
                                                        <input type="radio" name="vote" checked>
                                                        <span>Elegir candidato</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="col-md-4">
                                            <button  style="width: 100%; 
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
                                            <button type="submit" style="width: 100%; 
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
                        
                    </div>
                </div>
            </form>
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
