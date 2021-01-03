
<table id="customers">
    <thead>
        <tr >
            <th >Código</th>
            <th >Nombre</th>
            <th >Tipo </th>
            @switch($type)
                @case("1")
                    @break
                @case("2")
                <th >Provincia</th>
                    @break
                @case("3")
                <th >Cantón</th>
                    @break
            @endswitch
            
            <th >Estado</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($locations as $location)
        <tr>
            <td >{{$location->code}}</td>
            <td >{{$location->name}}</td>
                @switch($location->type)
                    @case("1")
                    <td >Provinca</td>
                        @break
                    @case("2")
                    <td >Cantón</td>
                    <td >{{$location->father->name}}</td>
                        @break
                        @case("3")
                    <td >Parroquia </td>
                    <td >{{$location->father->name}}</td>
                        @break
                        
                @endswitch
            <td >
                <div class="onoffswitch">
                    <input @if ($location->status==1)checked @endif
                    data-id="{{$location->id}}"
                    data-url="locations"
                    type="checkbox" name="onoffswitch" 
                    class="onoffswitch-checkbox" id="myonoffswitch{{$location->id}}" >
                    <label class="onoffswitch-label" for="myonoffswitch{{$location->id}}">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </td>
            <td>
                @can('update_enclosure')
                <a class="edit-btn" href="{{route('locations.edit',$location->id)}}"> <i class="fa fa-pencil-square-o"></i></a>
                @endcan
            </td>
            <td>
                {!! Form::open(['route' => ['locations.destroy', $location->id], 'method' => 'DELETE','class'=>'delete-item'.$location->id]) !!}
                   
                @can('destroy_enclosure') 
                <button  data-id="{{ $location->id}}"  class="del-btn delete-item-table" type="submit"><i class="fa fa-trash-o"></i></button>
                @endcan
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach     
    </tbody>
</table>
