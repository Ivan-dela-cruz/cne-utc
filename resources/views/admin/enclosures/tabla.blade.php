<table id="customers">
    <thead>
        <tr >
            <th >Recinto</th>
            <th >Femenina</th>
            <th >Masculino</th>
            <th >Total</th>
            <th >Electores</th>
            <th >zona</th>
            <th >Parroquia</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enclosures as $enclosure)
        <tr>
            <td >{{$enclosure->name}}</td>
            <td >{{$enclosure->meeting_fem}}</td>
            <td >{{$enclosure->meeting_mas}}</td>
            <td >{{$enclosure->meeting_total}}</td>
            <td >{{$enclosure->voters}}</td>
            <td >{{$enclosure->zone}}</td>
            <td >{{$enclosure->location->name}}</td>
            <td>
                @can('update_enclosure')
                <a class="edit-btn" href="{{route('enclosures.edit',$enclosure->id)}}"> <i class="fa fa-pencil-square-o"></i></a>
                @endcan
            </td>
            <td>
                {!! Form::open(['route' => ['enclosures.destroy', $enclosure->id], 'method' => 'DELETE','class'=>'delete-item'.$enclosure->id]) !!}
                   
                @can('destroy_enclosure') 
                <button  data-id="{{ $enclosure->id}}"  class="del-btn delete-item-table" type="submit"><i class="fa fa-trash-o"></i></button>
                @endcan
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach     
    </tbody>
</table>