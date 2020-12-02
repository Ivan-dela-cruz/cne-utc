@extends('admin.init.index')
@section('title','candidates')
@section('content')
    <form action="{{url('candidatest')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-7">
            <!-- profile-edit-container-->
            <div class="profile-edit-container">
                <div class="profile-edit-header fl-wrap">
                    <h4>Nuevo Candidato</h4>
                </div>
                <div class="custom-form">
                    <label>Nombre <i class="fa fa-user-o"></i></label>
                    <input name="name" type="text" placeholder="" value="{{old('name')}}"/>
                   
                    <label> Apellido <i class="fa fa-globe"></i> </label>
                    <input name="last_name" type="text" placeholder="" value=""/>
                    <label> Partido politico <i class="fa fa-globe"></i> </label>
                    <select name="organization_id"  class="chosen-select" >
                        <option>Partidos Polìticos</option>
                        @foreach($organizations as $organization )
                     
                        <option value="{{$organization->id}}"> {{$organization->name}}</option>
                        @endforeach
                    </select>
                    <select name="position_id" class="chosen-select" >
                        <option>Cargo</option>
                        @foreach($positions as $position )
                        
                        <option value="{{$position->id}}"> {{$position->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                            class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="edit-profile-photo fl-wrap">
                <img src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
                <div class="change-photo-btn">
                    <div class="photoUpload">
                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                        <input name="image" type="file" class="upload">
                    </div>
                </div>
            </div>

        </div>


    </form>
@endsection