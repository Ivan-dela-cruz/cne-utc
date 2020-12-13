@extends('web.init.index')
@section('title','Home')

@section('content')
    <div id="wrapper">
        <!-- Content-->
        <div class="content">
            <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                <div class="bg"  data-bg="{{asset('assets/images/principal.png')}}" data-scrollax="properties: { translateY: '200px' }"></div>
                <div class="hero-section-wrap fl-wrap">
                    <div class="container">
                            <div class="custom-form">
                    
                                <div  class="row block-div">
                                        
                                    <div class="col-md-3">
                                        <select  data-placeholder="All Categories" class="chosen-select-canton">
                                    
                                            @foreach($cantons as $canton)
                                                <option value="{{$canton->id}}">{{$canton->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="col-md-3">
                                        <select   data-placeholder="All Categories" class="chosen-select-parish">
                                                @include('web.selects.parishes')
                                        </select>
                                    </div>
                
                                    <div class="col-md-3">
                                        <select  data-placeholder="All Categories" class="chosen-select-enclosure">
                                        
                                            @include('web.selects.enclosures')
                                        </select>
                                    </div>
            
                                    <div class="col-md-1">
                                        <select  data-placeholder="All Categories" class="chosen-select-gender">
                                            <option value="meeting_fem">F</option>
                                            <option value="meeting_mas">M</option>
                                        </select>
                                    </div>
            
                                    <div class="col-md-1">
                                        <select  data-placeholder="All Categories" class="chosen-select-meeting">
                                        
                                        @include('web.selects.meeting')
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="bubble-bg"> </div>
                
            </section>
                          
            {!! Form::open(['url' => route('store-president'), 'method' => 'post','id'=>'form_data']) !!}
            <section class="gray-bg" id="sec2" >
                <div class="container">
                    <div class="row" id ="ContentListCandidates">
                        <div class="col-md-12">
                            <div class="listsearch-header fl-wrap">
                                <h3>Asambleistas Nacionales</h3>
                                <div class="listing-view-layout">
                                    <ul>
                                        <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                        <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="list-main-wrap fl-wrap card-listing row ">
                                @foreach($organizations as $organization)
                                <div class="col-md-3">
                                    
                                    <div style="width: 100%;" class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div  class="geodir-category-img">
                                                <img style="height: 150px; width: 100%;" src="{{$organization->url_image}}"
                                                     alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                
                                                <div class="listing-avatar">
                                                    <span
                                                        class="avatar-tooltip"><strong>{{$organization->name}}</strong></span>
                                                </div>
                                                <h4>
                                                    <a href="listing-single.html">{{$organization->name}} </a>
                                                </h4>
                                            </div>
                                        </article>
                                    </div>
                                    <div style="background-color: #fff; padding: 10px;" class="row">
                                        <div class="col-md-12">

                                                <div class="custom-form">
                                                   
                                                    {{ Form::text('list[]', null, ['class' => '','placeholder'=>'Ingrese votos']) }}
                                                    {{ Form::hidden('organizations[]',$organization->id , ['class' => '','placeholder'=>'id organizacion']) }}
                                                </div>
                                                <div class="accordion">
                                                    <a class="toggle act-accordion" href="#"> Ver integrantes  <i class="fa fa-angle-down"></i></a>
                                                    <div class="accordion-inner">
                                                        <ul>
                                                            @foreach($organization->candidates->where('indent',env('POSITION_NATIONAL','AN')) as $candidate)
                                                            <li>
                                                                <a href="javascript: return void;">
                                                                    {{$candidate->name}} {{$candidate->last_name}}
                                                                </a>
                                                                
                                                            </li>
                                                            @endforeach
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            {{----
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
                                            
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <h3><a href="javascript: void();">{{$organization->name}}</a></h3>
                                            <div class="custom-form">
                                                    {{ Form::text('list[]', null, ['class' => '','placeholder'=>'Ingrese votos']) }}
                                                    {{ Form::hidden('organizations[]',$organization->id , ['class' => '','placeholder'=>'id organizacion']) }}
                                            </div>
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
                    </div>
                    <!--listing-carousel end-->
                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                </div>
                
               
            </section>
            -----}}
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Otros votos </h3>
                                </div>
                                <div class="custom-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input hidden  name="type_election" value="{{env('POSITION_NATIONAL','AN')}}" type="text">
                                        <input hidden  name="canton" class="input-canton" id="input-canton" type="text">
                                        <input hidden  name="parish" class="input-parish" id="input-parish" type="text">
                                        <input hidden  name="enclosure" class="input-enclosure" id="input-enclosure" type="text">
                                        <input hidden  name="gender" class="input-gender" id="input-gender" type="text">
                                        <input hidden  name="meeting" class="input-meeting" id="input-meeting" type="text">
                                        <input  placeholder="Votos en blanco" name="vote_null" class="input-blank" id="input-blank" type="text">
                                    </div>
                                    <div class="col-md-3">
                                        <input  placeholder="Votos nulos" name="vote_blank" class="input-null" id="input-null" type="text">
                                    </div>
                                    <div class="col-md-3">
                                         <button type="button" style="width: 100%; margin-top: 0; margin-right: 10px; background-color: #3a3939;" class="btn  big-btn  color-bg flat-btn" id="btn_block">Habilitar<i class="fa fa-unlock"></i></button>
                                    
                                    </div>
                                    <div class="col-md-3">

                                   <button type="button" style="width: 100%; margin-top:0; background-color: #D0161A;" class="btn  big-btn  color-bg flat-btn" id="btn_send">Registar<i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                                
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/script_pages.js')}}"></script>
@endsection
