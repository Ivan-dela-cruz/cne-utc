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
            <section class="gray-bg" id="sec2"  style="display: none">    
            {!! Form::open(['url' => route('store-president'), 'method' => 'post','id'=>'form_data']) !!}
            <section class="gray-bg"  >
                <div class="container">
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
                                    <div style="background-color: #fff; padding: 10px;" class="row">
                                        <div class="col-md-12">

                                                <div class="custom-form">
                                                    {{ Form::text('list[]', null, ['class' => '','placeholder'=>'Ingrese votos','required'=>true, 'onKeyPress'=>'return soloNumeros(event)']) }}
                                                    {{ Form::hidden('organizations[]',$candidates[$i]['vice']->organization->id , ['class' => '','placeholder'=>'id organizacion']) }}
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                                        <input hidden name="type_election" value="{{env('POSITION_PRESIDENT','PR')}}" type="text">
                                        <input hidden name="canton" class="input-canton" id="input-canton" type="text">
                                        <input hidden name="parish" class="input-parish" id="input-parish" type="text">
                                        <input hidden name="enclosure" class="input-enclosure" id="input-enclosure" type="text">
                                        <input hidden name="gender" class="input-gender" id="input-gender" type="text">
                                        <input hidden name="meeting" class="input-meeting" id="input-meeting" type="text">
                                        <input  placeholder="Votos en blanco" name="vote_null" onKeyPress="return soloNumeros(event)"  class="input-blank" id="input-blank" type="text" required >
                                    </div>
                                    <div class="col-md-3">
                                        <input  placeholder="Votos nulos" name="vote_blank"  onKeyPress="return soloNumeros(event)" class="input-null" id="input-null" type="text"required >
                                    </div>
                                    <div class="col-md-3">
                                         <button type="button" style="width: 100%; margin-top: 0; margin-right: 10px; background-color: #3a3939;" class="btn  big-btn  color-bg flat-btn" id="btn_block">Habilitar<i class="fa fa-unlock"></i></button>
                                    
                                    </div>
                                    <div class="col-md-3">

                                   <button type="submit" style="width: 100%; margin-top:0; background-color: #D0161A;" class="btn  big-btn  color-bg flat-btn" id="btn_send">Registar<i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {!! Form::close() !!}
        </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/script_pages.js')}}"></script>
@endsection
