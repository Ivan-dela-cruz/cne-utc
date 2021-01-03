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
<<<<<<< HEAD
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
                                    float:left;" 
                                    type="submit"
                                    data-id="{{ $position->id}}"
                                    class="delete-item-table" >
                                    Eliminar <i class="fa fa-trash-o"></i></button>
                                @endcan
                                {!! Form::close() !!}
=======
                                    class="fa fa-pencil-square-o"></i></a></li>
                                    @endcan
                        {!! Form::open(['route' => ['positions.destroy', $position->id], 'method' => 'DELETE','class'=>'delete-item'.$position->id]) !!}
                    
                         <li><a href="#" class="btn del-btn">Eliminar <i class="fa fa-trash-o"></i></a></li>
                       
                         @can('destroy_position')
                        <button type="submit">Borrar</button>
                        @endcan
                        {!! Form::close() !!}
>>>>>>> feat:after rebase
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach