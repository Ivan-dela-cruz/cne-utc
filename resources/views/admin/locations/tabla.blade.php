
@foreach($provinces as $province)
    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-image">
                <a href="listing-single.html"><img src="{{asset($province->url_image)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <div class="row">
                    <h4>{{$province->name}}</h4>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Nombre completo:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$province->long_name}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Cargo:</span> :
                        <span class="booking-text">{{$province->name}}</span>
                    </div>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    <li><a href="{{route('locations.edit',$province->id)}}">Editar <i class="fa fa-pencil-square-o"></i></a>
                    </li>
                    {!! Form::open(['route' => ['locations.destroy', $province->id], 'method' => 'DELETE','class'=>'delete-item'.$province->id]) !!}
                    <li><a href="#" class="btn del-btn">Eliminar <i class="fa fa-trash-o"></i></a></li>
                    <button type="submit">Borrar</button>
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div>
@endforeach
