@extends('admin.init.index')
@section('title','Votes')
@section('Votes')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('positions.index')}}">Votos</a>
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
                <h3>Votos</h3>
                
            </div>  
        </div>
        <div class="profile-edit-container" style="align-content: center;">
        <div class="custom-form">
            <div class="profile-edit-header fl-wrap">
                <div class="col-md-3">
        <div class="header-search-select-item" >
            <select data-placeholder="All Categories" class="chosen-select"  >
                <option >Organizacion</option>
            
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="header-search-select-item" >
            <select data-placeholder="All Categories" class="chosen-select" >
                <option>Canton </option>
              
            </select>
        </div>
    </div>
        <div class="col-md-3" >
        <div class="header-search-select-item" >
            <select data-placeholder="All Categories" class="chosen-select" >
                <option>Parroquia</option>
               
            </select>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="col-md-3" >

        <div class="header-search-select-item" >
            <select data-placeholder="All Categories" class="chosen-select" >
                <option>Recinto </option>
               
            </select>
        </div>
    
</div>
<div class="col-md-3" >

    <div class="header-search-select-item" >
        <select data-placeholder="All Categories" class="chosen-select" >
            <option>Genero </option>
      
        </select>
    </div>
</div>
    <div class="col-md-3 ">

        <div class="header-search-select-item" >
            <select data-placeholder="All Categories" class="chosen-select" >
                <option>Junta </option>
            </select>
        </div>
    </div>
</div>
</div>

</div>
<div class="col-md-6" style="align-items: center">
    <button type="submit" class="btn  big-btn  color-bg flat-btn" style="background:black">Consultar<i
        class="fa fa-angle-right"></i></button>
    </div>
   
@endsection