<label>Nombre <i class="fa fa-user-o"></i></label>
{{ Form::text('name', null, ['class' => '', 'id' => 'name']) }}
@error('name')
<strong class="text-danger">{{ $message }}</strong>
@enderror
<label>Descipción <i class="fa fa-user-o"></i></label>
{{ Form::text('description', null, ['class' => '', 'id' => 'description']) }}
@error('description')
<strong class="text-danger">{{ $message }}</strong>
@enderror

@foreach($permissions as $permission => $v)
    <div class="dashboard-list-box fl-wrap activities">
        <div class="dashboard-header fl-wrap">
            <h3>{{$permission}}</h3>
        </div>
        <div class="dashboard-list">
            <div class="dashboard-message">
                <div class="dashboard-message-text">
                    <div class="row">
                        @foreach($v as $p)
                            <div class="col-md-3">
                                <label>
                                    {{ Form::checkbox('permissions[]', $p->id) }} {{ $p->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


<button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
        class="fa fa-angle-right"></i></button>
