<table class="table table-striped table-bordered table-hover table-dark">
    <thead>
        <tr>
            <th>Organización</th>
            <th>Votos</th>
            <th>Porcentajes</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($organizations as $organization)
        <tr>
            <td>{{ $organization->organization}}</td>
            <td>{{ $organization->votes}}</td>
            <td>{{ round(($organization->votes/$total)*100,2)}} %</td>
        </tr>
        @endforeach
       
    </tbody>
</table>