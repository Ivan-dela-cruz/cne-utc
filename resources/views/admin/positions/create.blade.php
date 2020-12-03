@extends('admin.init.index')
@section('title','Positions')
@section('content')
    <form action="{{url('positionst')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-7">
            <!-- profile-edit-container-->
            <div class="profile-edit-container">
                <div class="profile-edit-header fl-wrap">
                    <h4>Nueva Cargo</h4>
                </div>
                <div class="custom-form">
                    <label>Nombre <i class="fa fa-user-o"></i></label>
                    <input name="name" type="text" placeholder="" value="{{old('name')}}"/>
                    <label>Descripciòn<i class="fa fa-envelope-o"></i> </label>
                    <input name="description" type="text" placeholder="" value=""/>                       
                    <label>Inicio de Cargo<i class="fa fa-calendar-check-o"></i>  </label>
                    <input name="start_date" type="text" placeholder="Date" class="datepicker"   data-large-mode="true" data-large-default="true" value=""/>
                    <label>Finalizaciòn de Cargo<i class="fa fa-calendar-check-o"></i>  </label>
                    <input name="end_date" type="text" placeholder="Date" class="datepicker"   data-large-mode="true" data-large-default="true" value=""/>
                        
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