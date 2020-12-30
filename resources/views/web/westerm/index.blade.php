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
                
                                    <div class="col-md-12">
                                        <select  data-placeholder="Dignidades" class="chosen-select-position-web">
                                        
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
                    <div class="col-md-12">
                        <h5>Resultados generales</h5>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <div class="table-webster">
                            <div class="text-center">
                                <img height="320" src="{{asset('assets/images/select.jpg')}}" alt="">
                                <h6>Selecciona una opción para ver los resultados</h6>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
                
            </section>
        </div>
    </div>
@endsection

@section('scripts')
     <script type="text/javascript" src="{{asset('js/script_pages.js')}}"></script>
@endsection