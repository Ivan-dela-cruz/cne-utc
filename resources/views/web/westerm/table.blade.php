
<table class="table table-striped table-bordered table-hover table-dark">
    <thead>
        <tr>
            <th>ORGANIZACION</th>
            @for($i = 0; $i < count($series); $i++)
                <td>{{ $series[$i]}}</td>
            @endfor
           
        </tr>
    </thead>
    <tbody>
        
        @foreach($results as $res)
        <tr>
            <td>{{$res['organization']}}</td>
            @foreach($res['lista'] as $k)
                <p hidden>{{$cont = 0}}</p>
                @foreach($webster as $web)
                    @if($k['votes'] == $web['votes'] )
                       <p hidden> {{$cont++}}</p>
                        
                    @endif
                @endforeach
                @if($cont>0)
                    <td style="background-color: rgb(241, 67, 67);">{{$k['votes']}}</td>
                @else
                    <td>{{$k['votes']}}</td>
                @endif
           
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
