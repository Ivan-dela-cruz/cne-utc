@foreach($positions as $position)
                <div class="dashboard-list">
                    <div class="dashboard-message">
                        
                        <div class="dashboard-listing-table-image">
                            <a href="javascript:void(0);"><img  src="{{asset($position->url_image)}}" alt="IMG cargo"></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <div class="row">
                                        <h4><span>{{$position->name}}</span></h4>
                                        <div class="booking-details fl-wrap">
                            
                                            <span class="booking-text"><a href="listing-sinle.html">{{$position->description}}</a></span>
                                        </div>
                                        
                                       
                            </div>   
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                @can('update_position')
                                 <li><a href="{{route('positions.edit',$position->id)}}">Editar <i
                                class="fa fa-pencil-square-o"></i></a></li>
                                @endcan
                                {!! Form::open(['route' => ['positions.destroy', $position->id], 'method' => 'DELETE','class'=>'delete-item'.$position->id]) !!}
                                @can('destroy_position')
                                    <button 
                                    type="submit"
                                    data-id="{{ $position->id}}"
                                    class="del-btn delete-item-table" >
                                    Eliminar <i class="fa fa-trash-o"></i></button>
                                @endcan
                                {!! Form::close() !!}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach