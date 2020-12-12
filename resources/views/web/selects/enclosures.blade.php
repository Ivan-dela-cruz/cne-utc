
@if(isset($enclosures))
    @if(count($enclosures)>0)
        @foreach($enclosures as $enclosure)
        <option value="{{$enclosure->id}}">{{$enclosure->name}}</option>
        @endforeach
    @else
        <option value="0">No hay recintos que mostrar</option>
    @endif
     
@else
<option value="0">No hay recintos que mostrar</option>
@endif
