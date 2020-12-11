<div class="col-md-7">
    <div class="profile-edit-container">
        <div class="profile-edit-header fl-wrap">
            @if(isset($candidate))
                <h4>Editar Candidato</h4>
            @else
                <h4>Nuevo Candidato</h4>
            @endif

        </div>
        <div class="custom-form">

            <label>Nombre <i class="fa fa-user-o"></i></label>
            {!! Form::text('name', null,['id'=>'name']) !!}

            <label> Apellido <i class="fa fa-globe"></i> </label>
            {!! Form::text('last_name', null,['id'=>'last_name']) !!}

            <label> Partido politico <i class="fa fa-globe"></i> </label>
            {!! Form::select('organization_id', $organizations , null , ['class' => 'chosen-select']) !!}

            <label> Cargo: <i class="fa fa-globe"></i> </label>
            {!! Form::select('position_id', $positions , null , ['class' => 'chosen-select']) !!}
            <label>Inicio de Cargo<i class="fa fa-calendar-check-o"></i></label>
            <input name="start_date" type="text" placeholder="Date" class="datepicker"   data-large-mode="true" data-large-default="true" value=""/>
            @error('start_date')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label>Fin de Cargo<i class="fa fa-calendar-check-o"></i>  </label>
            <input name="end_date" type="text" placeholder="Date" class="datepicker"   data-large-mode="true" data-large-default="true" value=""/>
            @error('end_date')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>

<div class="col-md-2">
    <div class="edit-profile-photo fl-wrap">
        @if(isset($candidate))
            <img id="show_img" src="{{asset($candidate->url_image)}}" class="respimg" alt="">
        @else
            <img id="show_img" src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
        @endif


        <div class="change-photo-btn">
            <div class="photoUpload">
                <span><i class="fa fa-upload"></i> Upload Photo</span>
                {!! Form::file('image', ['id'=>'url_image','class' => 'upload']) !!}
            </div>
        </div>
    </div>

</div>
