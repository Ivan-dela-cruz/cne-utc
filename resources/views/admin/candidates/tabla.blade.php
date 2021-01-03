@foreach($candidates as $candidate)

    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-image">
                <a href="javascript:void(0);">
                    @if (!is_null($candidate->url_image))
                    <img style="width: 180px; height: 180px;" src="{{asset($candidate->url_image)}}" alt="imagen candidato">
                    @else
                    <img style="width: 180px; height: 180px;" src="{{asset('assets/images/user.png')}}" alt="imagen candidato">
                    @endif
                    
                </a>
            </div>
            <div class="dashboard-listing-table-text">
                <div class="row">
                    <h4>{{$candidate->name}} <span> {{$candidate->last_name}}</span></h4>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Lista:</span> :
                        <span class="booking-text"><a
                                href="javascript:void(0);">{{$candidate->organization->name}}</a></span>
                    </div>
                    <div class="booking-details fl-wrap">
                        <span class="booking-title">Cargo:</span> :
                        <span class="booking-text">{{$candidate->position->name}}</span>
                    </div>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    @can('update_candidate')
                    <li><a href="{{route('candidates.edit',$candidate->id)}}">Editar <i class="fa fa-pencil-square-o"></i></a>
                    </li>
                    @endcan
                    {!! Form::open(['route' => ['candidates.destroy', $candidate->id], 'method' => 'DELETE','class'=>'delete-item'.$candidate->id]) !!}
                    @can('destroy_candidate') 
                    <button 
                    data-id="{{ $candidate->id}}"
                    class="del-btn delete-item-table"
                    type="submit">Eliminar <i class="fa fa-trash-o"></i></button>
                    @endcan
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div>
@endforeach
