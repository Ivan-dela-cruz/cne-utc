@extends('admin.init.index')
@section('title','Enclousure')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Lista de Recintos</h3>
                @can('create_enclosure')
                <a href="{{ route('enclosures.create')}}" class="new-dashboard-item">Nuevo</a>
                @endcan
            </div>
            @include('admin.enclosures.tabla')
        </div>
    </div>
@endsection