@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Indox</h3>
                <a  href="{{ url('organizations/create') }}" class="new-dashboard-item">Nuevo</a>
            </div>
            @foreach($organizations as $organization)
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        
                        <div class="dashboard-listing-table-image">
                            <a href="listing-single.html"><img src="{{asset($organization->url_image)}}" alt=""></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <div class="row" >
                                        <h4>{{$organization->name}}<span> - ({{$organization->acronym}})</span></h4>
                                        <div class="booking-details fl-wrap ">
                                            <span class="booking-title">Lista:</span> :
                                            <span class="booking-text"><a href="listing-sinle.html">{{$organization->list}}</a></span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Representate:</span> : 
                                            <span class="booking-text">{{$organization->representative}}</span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Asambleistas:</span> : 
                                            <span class="booking-text">{{$organization->assembly_members}}</span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Prefectos:</span> : 
                                            <span class="booking-text">{{$organization->prefects}}</span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Alcaldes:</span> : 
                                            <span class="booking-text">{{$organization->mayors}}</span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Estado:</span> : 
                                            <span class="booking-text">{{$organization->status}}</span>
                                        </div>
                            </div>   
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="{{ url('organizations/'.$organization->id.'/edit')}}">Editar <i class="fa fa-pencil-square-o"></i></a></li>
                                <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
