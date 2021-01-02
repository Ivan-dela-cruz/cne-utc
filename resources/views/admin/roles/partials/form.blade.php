<label>Nombre <i class="fa fa-user-o"></i></label>
{{ Form::text('name', null, ['class' => '', 'id' => 'name','required'=>'required']) }}
@error('name')
<strong class="text-danger">{{ $message }}</strong>
@enderror
<label>Descipción <i class="fa fa-user-o"></i></label>
{{ Form::text('description', null, ['class' => '', 'id' => 'description','required'=>'required']) }}
@error('description')
<strong class="text-danger">{{ $message }}</strong>
@enderror
<div class="container-table">
    <table id="customers">
        <thead>
            <tr>
                <th>Módulo</th>
                <th style="text-align: center;">Crear</th>
                <th style="text-align: center;">Leer</th>
                <th style="text-align: center;">Modificar</th>
                <th style="text-align: center;">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission => $v)

                <tr>
                    <td>{{$permission}}</td>
                    @foreach($v as $p)
                        @if(isset($role))
                            @if($role->id !=1)
                                @if($p->id<=4)
                                    <td  style="text-align: center;"> {{ Form::checkbox('permissions[]', $p->id,null,['onclick'=>'this.checked=!this.checked;']) }}</td>
                                @else
                                    <td style="text-align: center;"> {{ Form::checkbox('permissions[]', $p->id) }}</td>
                                @endif
                            @else
                                <td  style="text-align: center;"> {{ Form::checkbox('permissions[]', $p->id,null,['onclick'=>'this.checked=!this.checked;']) }}</td>
                                 
                            @endif
                        @else
                            <td style="text-align: center;"> {{ Form::checkbox('permissions[]', $p->id) }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
        class="fa fa-angle-right"></i></button>
