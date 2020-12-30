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
                    @can('update_enclosure')
                    <li><a href="{{route('enclosures.edit',$enclosure->id)}}">Editar <i class="fa fa-pencil-square-o"></i></a>
                    </li>
                    @endcan
                    {!! Form::open(['route' => ['enclosures.destroy', $enclosure->id], 'method' => 'DELETE','class'=>'delete-item'.$enclosure->id]) !!}
                   
                    @can('destroy_enclosure') 
                    <button style="
                    all: unset;
                    cursor: pointer;
                    color:#fff;
                    padding:9px 22px;
                    border-radius:30px;
                    background: #f91942;
                    float:left;" type="submit">Eliminar <i class="fa fa-trash-o"></i></button>
                    @endcan
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div>
@endforeach