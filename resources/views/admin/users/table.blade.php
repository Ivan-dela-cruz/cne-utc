@foreach($users as $user)
    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-image">
                <a href="javascript:void(0);"><img src="{{asset($user->avatar)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <h4><a href="javascript:void(0);">{{$user->name}} {{$user->last_name}}</a> <span>({{$user->username}})</span></h4>
                <span class="dashboard-listing-table-address">
                    <i class="fa fa-envelope"></i><a  href="javascript:void(0);">{{$user->email}}</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-phone"></i><a  href="javascript:void(0);">{{$user->phone}}</a>
                </span>
                <span class="dashboard-listing-table-address  fl-wrap">
                    <i class="fa fa-address-card"></i><a  href="javascript:void(0);">{{$user->address}}</a>
                </span>
                <div class="listing-rating card-popup-rainingvis fl-wrap">
                    @foreach($user->roles as $role)
                    <span>{{$role->name}}</span>
                    @endforeach
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    @can('update_user') 
                        @if($user->id != 1)
                            <li>
                                <div class="onoffswitch">
                                    <input @if ($user->status==1)checked @endif
                                    data-id="{{$user->id}}"
                                    data-url="users"
                                    type="checkbox" name="onoffswitch" 
                                    class="onoffswitch-checkbox" id="myonoffswitch{{$user->id}}" >
                                    <label class="onoffswitch-label" for="myonoffswitch{{$user->id}}">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </li>
                        @endif
                        
                        @if (\Illuminate\Support\Facades\Auth::user()->id == 1)
                            <li><a class="edit-btn" href="{{route('users.edit',$user->id)}}">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                        @else
                            @if($user->id != 1)
                            <li><a class="edit-btn" href="{{route('users.edit',$user->id)}}">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                        
                            @endif
                        @endif
                      @endcan
                      @if($user->id != 1)
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE','class'=>'delete-item'.$user->id]) !!}
                            @can('destroy_position')
                            <button  data-id="{{ $user->id}}"  class="del-btn delete-item-table" type="submit"><i class="fa fa-trash-o"></i></button>
                            @endcan
                        {!! Form::close() !!}
                      @endif
                </ul>
            </div>
        </div>
    </div>
@endforeach
