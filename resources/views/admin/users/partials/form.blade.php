<div class="col-md-7">
    <div class="profile-edit-container">
        <div class="profile-edit-header fl-wrap">
            @if(isset($user))
                <h4> Editar usuario </h4>
            @else
                <h4> Nuevo usuario </h4>
            @endif
        </div>
        <div class="custom-form">
            <label>Nombre <i class="fa fa-user-o"></i></label>
            {!! Form::text('name',null, ['id'=>'name']) !!}
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            <label>Apellidos<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('last_name',null, ['id'=>'last_name']) !!}
            @error('last_name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            <label>Usuario<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('username',null, ['id'=>'username']) !!}
            @error('username')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            <label>Dirección<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('address',null, ['id'=>'address']) !!}
            @error('address')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            <label>Télefono<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('phone',null, ['id'=>'phone']) !!}
            @error('phone')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            <label>Email<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('email',null, ['id'=>'email']) !!}
            @error('phone')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            @if(!isset($user))
                <div class="custom-form no-icons">
                    <div class="pass-input-wrap fl-wrap">
                        <label>Contraseña</label>
                        {!! Form::password('password',null, ['id'=>'password','class'=>'pass-input']) !!}
                        @error('password')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                    </div>
                    <div class="pass-input-wrap fl-wrap">
                        <label>Confirmar Contraseña</label>
                        {!! Form::password('confirm_password',null, ['id'=>'confirm_password','class'=>'pass-input']) !!}
                        @error('confirm_password')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                    </div>
                </div>
            @endif
            <div class="dashboard-list-box fl-wrap activities">
                <div class="dashboard-header fl-wrap">
                    <h3>Roles</h3>
                </div>
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        <div class="dashboard-message-text">
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-3">
                                        <label>
                                            {{ Form::checkbox('roles[]', $role->id) }} {{ $role->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="edit-profile-photo fl-wrap">
        @if(isset($user))
            <img src="{{asset($user->url_image)}}" class="respimg" alt="">
        @else
            <img src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
        @endif
        <div class="change-photo-btn">
            <div class="photoUpload">
                <span><i class="fa fa-upload"></i> Subir foto</span>
                {!! Form::file('image', ['id'=>'image','class'=>'upload']) !!}
                @error('image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
    </div>
</div>
