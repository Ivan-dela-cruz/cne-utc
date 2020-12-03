@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Indox</h3>
                <a  href="{{ url('positions-create') }}" class="new-dashboard-item">Nuevo</a>
                
            </div>
            @foreach($positions as $position)
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        
                        <div class="dashboard-listing-table-image">
                            <a href="listing-single.html"><img src="{{asset($position->url_image)}}" alt=""></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <div class="row">
                                        <h4><span>{{$position->name}}</span></h4>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Descripciòn</span> :
                                            <span class="booking-text"><a href="listing-sinle.html">{{$position->description}}</a></span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Inicio de Cargo: </span> : 
                                            <span class="booking-text">{{$position->start_date}}</span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Fin de Cargo</span> : 
                                            <span class="booking-text">{{$position->end_date}}</span>
                                        </div>
                                       
                            </div>   
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="#">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                                <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection