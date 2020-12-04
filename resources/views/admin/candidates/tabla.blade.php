@foreach($candidates as $candidate)
    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-image">
                <a href="listing-single.html"><img src="{{asset($candidate->url_image)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <div class="row">
                    <h4>{{$candidate->name}}<span>{{$candidate->last_name}}</span></h4>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Lista:</span> :
                        <span class="booking-text"><a
                                href="listing-sinle.html">{{$candidate->organization->name}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Cargo:</span> :
                        <span class="booking-text">{{$candidate->position->name}}</span>
                    </div>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    <li><a href="{{route('candidates.edit',$candidate->id)}}">Editar <i class="fa fa-pencil-square-o"></i></a>
                    </li>
                    {!! Form::open(['route' => ['candidates.destroy', $candidate->id], 'method' => 'DELETE','class'=>'delete-item'.$candidate->id]) !!}
                    <li><a href="#" class="btn del-btn">Eliminar <i class="fa fa-trash-o"></i></a></li>
                    <button type="submit">Borrar</button>
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div>
@endforeach
