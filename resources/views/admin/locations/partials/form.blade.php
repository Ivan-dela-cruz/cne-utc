<div class="col-md-7">
    <div class="profile-edit-container">
        <div class="profile-edit-header fl-wrap">
            @if(isset($location))
                <h4>Editar Ubicación</h4>
            @else
                <h4>Nueva Ubicación</h4>
            @endif

        </div>
        <div class="custom-form">
            <label> Código <i class="fa fa-globe"></i> </label>
            {!! Form::text('code', null,['id'=>'last_name','required'=>'required']) !!}
            <label> Tipo: <i class="fa fa-globe"></i> </label>
            {!! Form::select('type', [
                    '1'=>'Provincia',
                    '2'=>'Cantón',
                    '3'=>'Parroquia'
            ] , null , ['class' => 'chosen-select type-location']) !!}
            <div  @if(isset($location))
                       @if ($location->type==1)
                           hidden
                        @endif
                    @else
                        hidden
                    @endif  
                class="province">
                <label> Provincia: <i class="fa fa-globe"></i> </label>
                {!! Form::select('provincie_id',$provinces, null , ['class' => 'chosen-select']) !!}
            </div>
            <div @if(isset($location))
                    @if ($location->type==1)
                        hidden
                    @endif
                 @else
                    hidden
                 @endif
                class="canton">
                <label> Cantón: <i class="fa fa-globe"></i> </label>
                {!! Form::select('canton_id',$cantons, null , ['class' => 'chosen-select canton']) !!}
            </div>
            
            <label>Nombre <i class="fa fa-user-o"></i></label>
            {!! Form::text('name', null,['id'=>'name','required'=>'required']) !!}

            <label> Nombre completo <i class="fa fa-globe"></i> </label>
            {!! Form::text('long_name', null,['id'=>'last_name','required'=>'required']) !!}

            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>
