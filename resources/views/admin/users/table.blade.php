@foreach($users as $user)
    <div class="dashboard-list">
        <div class="dashboard-message">
            <div class="dashboard-listing-table-image">
                <a href="listing-single.html"><img src="{{asset($user->avatar)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <h4><a href="listing-single.html">{{$user->name}} {{$user->last_name}}</a></h4>
                
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    @can('update_user') 
                      <li><a href="{{route('users.edit',$user->id)}}">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                      @endcan
                      @can('destroy_user') <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                      @endcan
                </ul>
            </div>
        </div>
    </div>
@endforeach
