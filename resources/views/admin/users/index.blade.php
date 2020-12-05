@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Lista de usuarios</h3>
                <span class="new-dashboard-item"><a href="{{route('users.create')}}">Nuevo</a></span>
            </div>
            @include('admin.users.table')
        </div>
    </div>
@endsection
