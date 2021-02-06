@if (count($votes)>0)
<table id="customers">
    <thead>
        <tr >
            <th >Organizacion</th>
            <th >Género</th>
            <th >Junta</th>
            <th >Votos </th>
            <th >Tipo</th>
            <th >Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($votes as $vote)
        <tr>
            <td >{{$vote->organization['name']}}</td>
            <td >
                @if ($vote->gender == 'meeting_fem')
                    Femenino
                @else
                    Masculino
                @endif
            </td>
            <td >
                {{$vote->meeting}}
            </td>
               
            <td >
                <div class="custom-form">
                    <input  class="form-control vote{{$vote->id}}" value="{{$vote->votes}}" onkeypress="return soloNumeros(event)" type="text">
                </div>
            </td>
                   
            <td >{{$vote->type_vote}} </td>
            <td>
                <a data-id="{{$vote->id}}" class="edit-btn btn-vote" href="javascript: void(0);"> 
                    <i class="fa fa-pencil-square-o"></i>
                </a>
            </td>
           
        </tr>
        @endforeach     
    </tbody>
</table>
       
@else
<div class="text-center">
    <img height="320" src="{{asset('assets/images/select.jpg')}}" alt="">
    @if (isset($keyword))
        <h6>No se hallaron resultados para <b> "{{$keyword}}"</b> </h6>
    @endif   
</div>
@endif  


