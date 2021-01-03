<table id="customers">
    <thead>
        <tr >
            <th >Role</th>
            <th >Descripción</th>
            <th >Estado</th>
            <th >Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td >{{$role->name}}</td>
            <td >{{$role->description}}</td>
            <td >
                @if($role->id >2)
                    <div class="onoffswitch">
                        <input @if ($role->status==1)checked @endif
                        data-id="{{$role->id}}"
                        data-url="roles"
                        type="checkbox" name="onoffswitch" 
                        class="onoffswitch-checkbox" id="myonoffswitch{{$role->id}}" >
                        <label class="onoffswitch-label" for="myonoffswitch{{$role->id}}">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                @endif
                
            </td>
            <td >
                @can('update_rol')
                <a class="edit-btn" href="{{route('roles.edit',$role->id)}}"> <i class="fa fa-pencil-square-o"></i></a>
                @endcan 
            </td>
            {{--
            <td>
                {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE','class'=>'delete-item'.$role->id]) !!}
                   
                @can('destroy_rol') 
                <button  data-id="{{ $role->id}}"  class="del-btn delete-item-table" type="submit"><i class="fa fa-trash-o"></i></button>
                @endcan
                {!! Form::close() !!}
            </td>
            --}}
        </tr>
        @endforeach     
    </tbody>
</table>