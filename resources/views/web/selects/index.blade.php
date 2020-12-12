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
                            <select style="width: 100%;" data-placeholder="All Categories" class="chosen-select-gender">
                                <option value="meeting_fem">F</option>
                                <option value="meeting_mas">M</option>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <select style="width: 100%;" data-placeholder="All Categories" class="chosen-select-meeting">
                            
                            @include('web.selects.meeting')
                            </select>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gray-bg" id="sec2" >
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
                                                    <input placeholder="Ingrese votos" type="text">
                                                    <button style="width: 100%; margin-top: -10px;" type="submit" class="btn color-bg flat-btn">Guardar</button>
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
           $('.chosen-select-gender').niceSelect();
           $('.chosen-select-meeting').niceSelect();
           
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
        
        function getSelectGender(id,gender){
            let url ='select-gender/'+id+'/'+gender;
            axios.get(url).then(function(response){
                    $('.chosen-select-meeting').empty();
                    $('.chosen-select-meeting').html(response.data);
                    $('.chosen-select-meeting').niceSelect('update');
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
       $(document).on('change','.chosen-select-gender',function(){
            let gender = $(this).val();
            let enclosure_id = $('.chosen-select-enclosure').val();
            if(enclosure_id != 0){
                getSelectGender(enclosure_id,gender);
            }else{
                alert('Selecciona un recinto para continuar');
            }
        });
      
     
    </script>
@endsection
