@extends('web.init.index')
@section('title','Resultados')
@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('css/tables.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
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
                                        <select data-placeholder="All Categories" class="chosen-select-canton">
                                
                                            @foreach($cantons as $canton)
                                                <option value="{{$canton->id}}">{{$canton->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="col-md-3">
                                        <select   data-placeholder="All Categories" class="chosen-select-result">
                                                @include('web.selects.parishes')
                                        </select>
                                    </div>
                
                                    <div class="col-md-3">
                                        <select  data-placeholder="Dignidades" class="chosen-select-position">
                                        
                                            @include('web.selects.positions')
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="bubble-bg"> </div>
                
            </section>
            <section >
                <div class="row ml-5 mr-5">
                    <div class="col-md-6 table_resum">
                        
                    </div>
                    <div class="col-md-6 table_total">
                        
                    </div>
                    <div style="background-color: #323539;" class="col-md-12">
                        <canvas id="myChart" style="height: 400px; width: 100%;"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
     <script type="text/javascript" src="{{asset('js/script_pages.js')}}"></script>
@endsection