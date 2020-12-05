@extends('admin.init.index')
@section('title','Positions')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Indox</h3>
                <a  href="{{route('positions.create') }}" class="new-dashboard-item">Nuevo</a>
                
            </div>
            @include('admin.positions.table')
        </div>
    </div>
@endsection