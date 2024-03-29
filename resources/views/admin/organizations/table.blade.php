@foreach($organizations as $organization)
    <div class="dashboard-list">
        <div class="dashboard-message">

            <div class="dashboard-listing-table-image">
                <a href="listing-single.html"><img src="{{asset($organization->url_image)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <div class="row">
                    <h4 class="col-md-12">{{$organization->name}}<span> - ({{$organization->acronym}})</span></h4>
                    <div class="col-md-6">
                        <div class="booking-details fl-wrap ">
                            <span class="booking-title">Lista:</span>
                            <span class="booking-text"><a href="listing-sinle.html">{{$organization->list}}</a></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Representate:</span>
                            <span class="booking-text">{{$organization->representative}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Asambleistas:</span>
                            <span class="booking-text">{{$organization->assembly_members}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Prefectos:</span>
                            <span class="booking-text">{{$organization->prefects}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Alcaldes:</span>
                            <span class="booking-text">{{$organization->mayors}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="booking-details fl-wrap">
                            <span class="booking-title">Estado:</span>
                            <span class="booking-text">{{$organization->status}}</span>
                        </div>
                    </div>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    @can('update_organization')
                    <li><a href="{{route('organizations.edit',$organization->id)}}">Editar <i
                                class="fa fa-pencil-square-o"></i></a></li>
                                @endcan
                    {!! Form::open(['route' => ['organizations.destroy', $organization->id], 'method' => 'DELETE','class'=>'delete-item'.$organization->id]) !!}
                   
                    @can('destroy_organization')
                      <button data-id="{{ $organization->id}}"
                        class="del-btn delete-item-table"
                      type="submit">Eliminar <i class="fa fa-trash-o"></i></button>
                      @endcan
                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div>
@endforeach
