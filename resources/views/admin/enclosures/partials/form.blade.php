<div class="col-md-7">
    <div class="profile-edit-container">
        <div class="profile-edit-header fl-wrap">
            @if(isset($enclosure))
                <h4>Editar Recinto</h4>
            @else
                <h4>Nuevo Recinto</h4>
            @endif

        </div>
        <div class="custom-form">

            <label>Nombre <i class="fa fa-user-o"></i></label>
            {!! Form::text('name', null,['id'=>'name']) !!}
            <label> Localidad: <i class="fa fa-globe"></i> </label>
            {!! Form::select('location_id', $parishes , null , ['class' => 'chosen-select']) !!}
            <label> Junta femenina <i class="fa fa-globe"></i> </label>
            {!! Form::select('meeting_fem', [
                '1'=>'1',
                '2'=>'2',
                '3'=>'3',
                '4'=>'4',
                '5'=>'5',
        ] , null , ['class' => 'chosen-select']) !!}

            <label> Junta Masculina: <i class="fa fa-globe"></i> </label>
      
            {!! Form::select('meeting_mas', [
                '1'=>'1',
                '2'=>'2',
                '3'=>'3',
                '4'=>'4',
                '5'=>'5',
        ] , null , ['class' => 'chosen-select']) !!}
        <label>Electores <i class="fa fa-user-o"></i></label>
        {!! Form::text('voters', null,['id'=>'voters']) !!}
        <label>Zona <i class="fa fa-user-o"></i></label>
        {!! Form::text('zone', null,['id'=>'zone']) !!}

            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>

];
