@extends('web.init.index')
@section('title','Home')

@section('content')
    <div id="wrapper">
        <!-- Content-->
        <div class="content">
            <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
               
                <div class="custom-form">
                    
                    <div style="padding-left: 80px;" class="row">
                            
                        <div class="col-md-3">
                            <select style="width: 100%;" data-placeholder="All Categories" class="chosen-select-canton">
                        
                                @foreach($cantons as $canton)
                                    <option value="{{$canton->id}}">{{$canton->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select style="width: 100%;"  data-placeholder="All Categories" class="chosen-select-parish">
                                    @include('web.selects.parishes')
                            </select>
                        </div>
    
                        <div class="col-md-3">
                            <select style="width: 100%;" data-placeholder="All Categories" class="chosen-select-enclosure">
                            
                                @include('web.selects.enclosures')
                            </select>
                        </div>

                        <div class="col-md-1">
                            <select style="width: 100%;" data-placeholder="All Categories" class="chosen-select">
                                <option value="meeting_fem">F</option>
                                <option value="meeting_mas">M</option>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <select style="width: 100%;" data-placeholder="All Categories" class="chosen-select">
                            
                            @include('web.selects.meeting')
                            </select>
                        </div>
                    </div>
                </div>
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
                                            <a class="listing-geodir-category" href="">Votar</a>

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
