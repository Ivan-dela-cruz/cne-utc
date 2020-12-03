@extends('admin.init.index')
@section('title','Roles')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Roles</h3>
                <span class="new-dashboard-item"><a href="{{route('roles.create')}}">Nuevo</a></span>
            </div>
            @foreach($roles as $role)
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        <div class="dashboard-listing-table-text">
                            <h4><a href="listing-single.html">{{$role->name}}</a></h4>
                            <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a href="#">USA 27TH Brooklyn NY</a></span>
                            <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                                <span>(2 reviews)</span>
                            </div>
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="{{route('roles.edit',$role->id)}}">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                                <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
