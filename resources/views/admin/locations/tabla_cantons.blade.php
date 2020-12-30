@foreach($cantons as $canton)
    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-image">
                <a href="listing-single.html"><img src="{{asset($canton->url_image)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <div class="row">
                    <h4>{{$canton->name}}</h4>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Lista:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$canton->name}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Cargo:</span> :
                        <span class="booking-text">{{$canton->name}}</span>
                    </div>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    @can('update_location')
                    <li><a href="{{route('locations.edit',$canton->id)}}">Editar <i class="fa fa-pencil-square-o"></i></a>
                    </li>
                    @endcan
                    {!! Form::open(['route' => ['locations.destroy', $canton->id], 'method' => 'DELETE','class'=>'delete-item'.$canton->id]) !!}
                   
                    @can('destroy_location')
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
