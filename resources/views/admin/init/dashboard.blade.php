@extends('admin.init.index')
@section('title','Candidates')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('candidates.index')}}">Candidatos</a>
    <span>Listado</span>
</div>
@endsection
@section('content')
    <div class="col-md-9">
        <div class="profile-edit-container">    
            <div class="statistic-container fl-wrap">
               
                <div class="statistic-item-wrap">
                    <div class="statistic-item gradient-bg fl-wrap">
                        <i class="fa fa-list-alt"></i>
                        <div class="statistic-item-numder">{{$positions}}</div>
                        <h5>Cargos</h5>
                    </div>
                </div>
                <div class="statistic-item-wrap">
                    <div class="statistic-item gradient-bg fl-wrap">
                        <i class="fa fa-address-card"></i>
                        <div class="statistic-item-numder">{{$organizations}}</div>
                        <h5>Organizaciones</h5>
                    </div>
                </div>
                <div class="statistic-item-wrap">
                    <div class="statistic-item gradient-bg fl-wrap">
                        <i class="fa fa-calendar-check-o"></i>
                        <div class="statistic-item-numder">{{$enclosures}}</div>
                        <h5>Recintos</h5>
                    </div>
                </div>
                <div class="statistic-item-wrap">
                    <div class="statistic-item gradient-bg fl-wrap">
                        <i class="fa fa fa-id-card-o"></i>
                        <div class="statistic-item-numder">{{$candidates}}</div>
                        <h5>Candidatos</h5>
                    </div>
                </div>
                <div class="statistic-item-wrap">
                    <div class="statistic-item gradient-bg fl-wrap">
                        <i class="fa fa-newspaper-o"></i>
                        <div class="statistic-item-numder">{{$electores}}</div>
                        <h5>Electores</h5>
                    </div>
                </div>
                <div class="statistic-item-wrap">
                    <div class="statistic-item gradient-bg fl-wrap">
                        <i class="fa fa-user-circle-o"></i>
                        <div class="statistic-item-numder">{{$users}}</div>
                        <h5>Usuarios</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
