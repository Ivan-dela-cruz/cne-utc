@extends('admin.init.index')
@section('title','Enclousure')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('enclosures.index')}}">Recintos</a>
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
                <div style="margin-top: 0px; margin-bottom: 10px; margin-left: -20px;" class="header-search">
                
                    {!! Form::open(['url' => route('enclosures.index'), 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
                    
                    <div style="width: 50%;" class="header-search-input-item">
                        <input style="width: 100%;"   @if (isset($keyword)) value="{{$keyword}}" @endif
                        type="text" placeholder="Buscar recintos" name="keyword"/>
                    </div>
                    <button type="submit" class="header-search-button" >Buscar</button>
                    {!! Form::close() !!}
                </div>
                @can('create_enclosure')
                <a href="{{ route('enclosures.create')}}" class="new-dashboard-item">Nuevo</a>
                @endcan
            </div>
            
            
        </div>
        @if (count($enclosures)>0)
            <div class="container-table">
                @include('admin.enclosures.tabla')
            </div>
            {{$enclosures->links()}}
        
        @else
        <div class="text-center">
            <img height="320" src="{{asset('assets/images/select.jpg')}}" alt="">
            @if (isset($keyword))
                <h6>No se hallaron resultados para <b> "{{$keyword}}"</b> </h6>
            @endif
            
        </div>
        @endif

       
        
    </div>
@endsection