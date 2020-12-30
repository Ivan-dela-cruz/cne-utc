
@if(isset($positions))
@if(count($positions)>0)
    @foreach($positions as $position)
      
        <option value="{{$position->indent}}">{{$position->name}}</option>
       
 
    @endforeach
@else
    <option value="0">No hay dignidades que mostrar</option>
@endif
 
@else
<option value="0">No hay dignidades que mostrar</option>
@endif