@extends('admin.init.index')
@section('title','Positions')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('positions.index')}}">Dignidades</a>
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
                <h3>Dignidades</h3>
                @can('create_position')
                  <a  href="{{route('positions.create') }}" class="new-dashboard-item">Nuevo</a>
                @endcan
            </div>
            @if (count($positions)>0)
                @include('admin.positions.table')
            @else
            <div class="text-center">
                <img height="320" src="{{asset('assets/images/select.jpg')}}" alt="">
                @if (isset($keyword))
                    <h6>No se hallaron resultados para <b> "{{$keyword}}"</b> </h6>
                @endif
            </div>
            @endif
           
        </div>
    </div>
@endsection