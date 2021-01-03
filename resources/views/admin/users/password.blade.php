@extends('admin.init.index')
@section('title','Cambiar contraseña')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('users.index')}}">Usuarios</a>
    <span>Contraseña</span>
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
        {!! Form::open(['url' => route('password-post')]) !!}
   
        <div class="profile-edit-container">
            <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                <h4>Cambiar contraseña</h4>
            </div>
            <div class="custom-form no-icons">
                <div class="pass-input-wrap fl-wrap">
                    <label>Contraseña actual </label>
                    <input name="current_password" type="password" class="pass-input" placeholder="" value=""/>
                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                    @error('current_password')
                    <label>
                        <strong style="text-align: right; color: red;">{{ $message }}</strong>
                    </label>
                    @enderror
                   
                </div>
                <div class="pass-input-wrap fl-wrap">
                    <label>Nueva Contraseña</label>
                    <input name="new_password" type="password" class="pass-input" placeholder="" value=""/>
                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                    @error('new_password')
                    <label>
                        <strong style="text-align: right; color: red;">{{ $message }}</strong>
                    </label>
                    @enderror
                </div>
                <div class="pass-input-wrap fl-wrap">
                    <label>Confirmar nueva contraseña</label>
                    <input name="new_confirm_password" type="password" class="pass-input" placeholder="" value=""/>
                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                    @error('new_confirm_password')
                    <label>
                        <strong style="text-align: right; color: red;">{{ $message }}</strong>
                    </label>
                    @enderror
                </div>
                <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar cambios<i class="fa fa-angle-right"></i></button>
            </div>
        </div>
       
        {!! Form::close() !!}
        <!-- profile-edit-container end-->                                        
    </div>
@endsection
