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
            <section >
                <div class="row ml-5 mr-5">
                    <div class="col-md-12">
                        <div class="table-container">
                            <table class="table table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>Organización</th>
                                <th>Cantón</th>
                                <th>Parroquia</th>
                                <th>Recinto</th>
                                <th>Género</th>
                                <th>Junta</th>
                                <th>Votos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organizations as $organization)
                                <tr>
                                    <td>{{$organization->organization}}</td>
                                    <td>{{$organization->canton}}</td>
                                    <td>{{$organization->parish}}</td>
                                    <td>{{$organization->enclosure}}</td>
                                    <td>
                                        @if($organization->gender == "meeting_fem")
                                            Femenino
                                        @else
                                            Masculino
                                        @endif
                                     </td>
                                    <td>{{$organization->meeting}}</td>
                                    <td>{{$organization->votes}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$organizations->render()}}
                    
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