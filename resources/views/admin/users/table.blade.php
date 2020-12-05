@foreach($users as $user)
    <div class="dashboard-list">
        <div class="dashboard-message">

            <div class="dashboard-listing-table-image">
                <a href="listing-single.html"><img src="{{asset($user->avatar)}}" alt=""></a>
            </div>
            <div class="dashboard-listing-table-text">
                <h4><a href="listing-single.html">{{$user->name}} {{$user->last_name}}</a></h4>
                <span class="dashboard-listing-table-address"><i class="fa fa-map-marker"></i><a href="#">USA 27TH Brooklyn NY</a></span>
                <div class="listing-rating card-popup-rainingvis fl-wrap" data-starrating2="5">
                    <span>(2 reviews)</span>
                </div>
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    <li><a href="{{route('users.edit',$user->id)}}">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                    <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
