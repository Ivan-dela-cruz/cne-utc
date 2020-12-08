
@if(count($parishes)>0)
    @foreach($parishes as $parish)
    <option value="{{$parish->id}}">{{$parish->name}}</option>
    @endforeach
@else
    <option value="0">No hay parroquias que mostrar</option>
@endif
