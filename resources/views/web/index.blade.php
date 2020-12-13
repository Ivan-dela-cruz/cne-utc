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
                                <div class="main-search-input-wrap">
                                      
                                     
                                       
                                </div>
                            </div>
                        </div>
                        <div class="bubble-bg"> </div>
                    </section>
                    <!-- section end -->

            <section id="sec2" class="gray-section">
                <div class="container">
                    <div class="section-title">
                        <h2>INGRESAR RESULTADOS</h2>
                        <div class="section-subtitle">Elije con responsabilidad</div>
                        <span class="section-separator"></span>
                    {{--  <p>No votes por Lasso y correa.</p> --}}  
                    </div>
                </div>
                <!-- carousel -->
                <div class="list-carousel fl-wrap card-listing ">
                    <!--listing-carousel-->
                    <div class="listing-carousel  fl-wrap ">
                        <!--slick-slide-item-->
                        @foreach($positions as $position)
                            <div class="slick-slide-item">
                                <!-- listing-item -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">

                                        <div class="geodir-category-img">
                                            <img src="{{asset($position->url_image)}}" alt="">
                                            <div class="overlay"></div>
                                            
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <a class="listing-geodir-category" href="{{route('selecion')}}">INGRESAR</a>

                                            <h3><a href="listing-single.html">{{$position->name}}</a></h3>
                                            <p>{{$position->description}} </p>
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

            <!--section -->
            
            <!-- section end -->
        </div>
        <!-- Content end -->
    </div>
@endsection


