
@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    <form action="{{url('organizationst')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-7">
            <!-- profile-edit-container-->
            <div class="profile-edit-container">
                <div class="profile-edit-header fl-wrap">
                    <h4>Nueva organización</h4>
                </div>
                <div class="custom-form">
                    <label>Nombre <i class="fa fa-user-o"></i></label>
                    <input name="name" type="text" placeholder="" value="{{old('name')}}"/>
                    <label>Lista<i class="fa fa-envelope-o"></i> </label>
                    <input name="list" type="text" placeholder="" value=""/>
                    <label>Siglas<i class="fa fa-phone"></i> </label>
                    <input name="acronym" type="text" placeholder="" value=""/>
                    <label> Representante <i class="fa fa-map-marker"></i> </label>
                    <input name="representative" type="text" placeholder="" value=""/>
                    <label> Asambleistas <i class="fa fa-globe"></i> </label>
                    <input name="assembly_members" type="text" placeholder="" value=""/>
                    <label> Prefectos <i class="fa fa-globe"></i> </label>
                    <input name="prefects" type="text" placeholder="" value=""/>
                    <label> Alcaldes <i class="fa fa-globe"></i> </label>
                    <input name="mayors" type="text" placeholder="" value=""/>
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
