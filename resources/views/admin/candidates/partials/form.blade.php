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

            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>

<div class="col-md-2">
    <div class="edit-profile-photo fl-wrap">
        @if(isset($candidate))
            <img src="{{asset($candidate->url_image)}}" class="respimg" alt="">
        @else
            <img src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
        @endif


        <div class="change-photo-btn">
            <div class="photoUpload">
                <span><i class="fa fa-upload"></i> Upload Photo</span>
                {!! Form::file('image', ['id'=>'image','class' => 'upload']) !!}
            </div>
        </div>
    </div>

</div>
