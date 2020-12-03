@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    <form action="{{route('organizations.update',$organization->id)}}" method="PUT" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-7">
            <!-- profile-edit-container-->
            <div class="profile-edit-container">
                <div class="profile-edit-header fl-wrap">
                    <h4>Nueva organización</h4>
                </div>
                <div class="custom-form">
                    <label>Nombre <i class="fa fa-user-o"></i></label>
                    <input name="name" type="text" placeholder="" value="{{$organization->name}}"/>
                    <label>Lista<i class="fa fa-envelope-o"></i> </label>
                    <input name="list" type="text" placeholder="" value="{{$organization->list}}"/>
                    <label>Siglas<i class="fa fa-phone"></i> </label>
                    <input name="acronym" type="text" placeholder="" value="{{$organization->acronym}}"/>
                    <label> Representante <i class="fa fa-map-marker"></i> </label>
                    <input name="representative" type="text" placeholder="" value="{{$organization->representative}}"/>
                    <label> Asambleistas <i class="fa fa-globe"></i> </label>
                    <input name="assembly_members" type="text" placeholder="" value="{{$organization->assembly_members}}"/>
                    <label> Prefectos <i class="fa fa-globe"></i> </label>
                    <input name="prefects" type="text" placeholder="" value="{{$organization->prefects}}"/>
                    <label> Alcaldes <i class="fa fa-globe"></i> </label>
                    <input name="mayors" type="text" placeholder="" value="{{$organization->mayors}}"/>
                    <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                            class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="edit-profile-photo fl-wrap">
                <img src="{{asset($organization->url_image)}}" class="respimg" alt="">
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