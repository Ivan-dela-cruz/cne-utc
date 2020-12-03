@extends('admin.init.index')
@section('title','Candidates')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Indox</h3>
                <a  href="{{ url('candidates-create') }}" class="new-dashboard-item">Nuevo</a>
            </div>
            @foreach($candidates as $candidate)
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        
                        <div class="dashboard-listing-table-image">
                            <a href="listing-single.html"><img src="{{asset($candidate->url_image)}}" alt=""></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <div class="row">
                                    
                                        <h4>{{$candidate->name}}<span>{{$candidate->last_name}}</span></h4>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Lista:</span> :
                                            <span class="booking-text"><a href="listing-sinle.html">{{$candidate->organization->name}}</a></span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Cargo:</span> : 
                                            <span class="booking-text">{{$candidate->position->name}}</span>
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
