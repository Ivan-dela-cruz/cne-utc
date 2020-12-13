@extends('admin.init.index')
@section('title','Ubicaciones')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Lista de ubicaciones</h3>
                @can('create_location')
                <a href="{{ route('locations.create')}}" class="new-dashboard-item">Nuevo</a>
                @endcan
            </div>
            @include('admin.locations.tabla')
            @include('admin.locations.tabla_cantons')
            @include('admin.locations.tabla_parish')
        </div>
    </div>
@endsection
