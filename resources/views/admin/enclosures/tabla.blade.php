@foreach($enclosures as $enclosure)
    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-text">
                <div class="row">
                    <h4>{{$enclosure->name}}<span></span></h4>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Junta Femenina:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$enclosure->meeting_fem}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Junta Masculina:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$enclosure->meeting_mas}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Junta Total:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$enclosure->meeting_total}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Electores:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$enclosure->voters}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Zona:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$enclosure->zone}}</a></span>
                    </div>
                      
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Parroquia:</span> :
                        <span class="booking-text">{{$enclosure->location->name}}</span>
                    </div>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    <li><a href="{{route('enclosures.edit',$enclosure->id)}}">Editar <i class="fa fa-pencil-square-o"></i></a>
                    </li>
                    {!! Form::open(['route' => ['enclosures.destroy', $enclosure->id], 'method' => 'DELETE','class'=>'delete-item'.$enclosure->id]) !!}
                    <li><a href="#" class="btn del-btn">Eliminar <i class="fa fa-trash-o"></i></a></li>
                    <button type="submit">Borrar</button>
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div>
@endforeach