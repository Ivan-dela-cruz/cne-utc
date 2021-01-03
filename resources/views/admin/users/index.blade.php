@extends('admin.init.index')
@section('title','Usuarios')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('users.index')}}">Usuarios</a>
    <span>Listado</span>
</div>
@endsection
@section('content')
    <div class="col-md-9">
        @if (session('status'))
            @if (session('status')!="error")
                <div class="notification success fl-wrap">
                    <p>{{session('status')}}</p>
                    <a class="notification-close" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                </div>
            @else
                <div class="notification reject fl-wrap">
                    <p>Error al realizar la petición</p>
                    <a class="notification-close" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                </div>
            @endif
        @endif
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Lista de usuarios</h3>
                @can('create_user')
                <a href="{{ route('users.create')}}" class="new-dashboard-item">Nuevo</a>
                @endcan
            </div>
            @include('admin.users.table')
        </div>
    </div>
@endsection
