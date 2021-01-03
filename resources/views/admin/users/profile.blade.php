@extends('admin.init.index')
@section('title','Mi perfil')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('users.index')}}">Usuarios</a>
    <span>Mi perfil</span>
</div>
@endsection
@section('content')
      
           
       
        {!! Form::model($user,['url' => route('update-profile',$user->id),'method' => 'PUT','files' => true]) !!}
        <div class="col-md-7">
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
            <div class="profile-edit-container">
                <div class="profile-edit-header fl-wrap">
                    <h4> Mi perfil </h4>
                </div>
                <div class="custom-form">
                    <label>Nombre <i class="fa fa-user-o"></i></label>
                    {!! Form::text('name',null, ['id'=>'name','required'=>'required']) !!}
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                    <label>Apellidos<i class="fa fa-envelope-o"></i> </label>
                    {!! Form::text('last_name',null, ['id'=>'last_name','required'=>'required']) !!}
                    @error('last_name')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                    <label>Usuario<i class="fa fa-envelope-o"></i> </label>
                    {!! Form::text('username',null, ['id'=>'username','required'=>'required']) !!}
                    @error('username')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                    <label>Dirección<i class="fa fa-envelope-o"></i> </label>
                    {!! Form::text('address',null, ['id'=>'address','required'=>'required']) !!}
                    @error('address')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                    <label>Télefono<i class="fa fa-envelope-o"></i> </label>
                    {!! Form::text('phone',null, ['id'=>'phone','required'=>'required']) !!}
                    @error('phone')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                    <label>Email<i class="fa fa-envelope-o"></i> </label>
                    {!! Form::text('email',null, ['id'=>'email','required'=>'required']) !!}
                    @error('phone')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                    <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                            class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="edit-profile-photo fl-wrap">
               
                @if(isset($user))
                    <img id="show_img" src="{{asset($user->avatar)}}" class="respimg" alt="">
                @else
                    <img id="show_img" src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
                @endif
                <div class="change-photo-btn">
                    <div class="photoUpload">
                        <span><i class="fa fa-upload"></i> Subir foto</span>
                        {!! Form::file('image', ['id'=>'url_image','class'=>'upload']) !!}
                        @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
       
@endsection


