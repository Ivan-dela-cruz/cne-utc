@if(isset($meetings))
    @if(isset($meetings))
        @for($i = 0; $i <$meetings; $i++)
        <option  value="{{$i+1}}">{{$i+1}}</option>
        @endfor
    @else
        <option value="0">0</option>
    @endif
@else
<option value="0">N/A</option>
@endif

     