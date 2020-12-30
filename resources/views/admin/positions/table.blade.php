@foreach($positions as $position)
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        
                        <div class="dashboard-listing-table-image">
                            <a href="listing-single.html"><img src="{{asset($position->url_image)}}" alt=""></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <div class="row">
                                        <h4><span>{{$position->name}}</span></h4>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Descripciòn</span> :
                                            <span class="booking-text"><a href="listing-sinle.html">{{$position->description}}</a></span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Inicio de Cargo: </span> : 
                                            <span class="booking-text">{{$position->start_date}}</span>
                                        </div>
                                        <div class="booking-details fl-wrap">
                                            <span class="booking-title">Fin de Cargo</span> : 
                                            <span class="booking-text">{{$position->end_date}}</span>
                                        </div>
                                       
                            </div>   
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                @can('update_position')
                                 <li><a href="{{route('positions.edit',$position->id)}}">Editar <i
                                class="fa fa-pencil-square-o"></i></a></li>
                                @endcan
                                {!! Form::open(['route' => ['positions.destroy', $position->id], 'method' => 'DELETE','class'=>'delete-item'.$position->id]) !!}
                                @can('destroy_position')
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