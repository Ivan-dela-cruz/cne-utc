<table class="table table-striped table-bordered table-hover table-dark">
    <thead>
        <tr>
            <th>Información</th>
            <th>Total</th>
            <th>Hombres</th>
            <th>Mujeres</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>NÚMERO DE ELECTORES</td>
            <td>{{$data['voters']}}</td>
            <td>{{$data['voters_mas']}}</td>
            <td>{{$data['voters_fem']}}</td>
        </tr>
        <tr>
            <td>JUNTAS RECEPTORAS</td>
            <td>{{$data['total']}}</td>
            <td>{{$data['mas']}}</td>
            <td>{{$data['fem']}}</td>
        </tr>
        <tr>
            <td>VOTOS VÁLIDOS</td>
            <td>{{$vote_t}}</td>
            <td>{{$vote_tmas}}</td>
            <td>{{$vote_tfem}}</td>
        </tr>
        <tr>
            <td>VOTOS EN BLANCO</td>
            <td>{{$vote_b}}</td>
            <td>{{$vote_bmas}}</td>
            <td>{{$vote_bfem}}</td>
        </tr>
        <tr>
            <td>VOTOS NULOS</td>
            <td>{{$vote_n}}</td>
            <td>{{$vote_nmas}}</td>
            <td>{{$vote_nfem}}</td>
        </tr>
        <tr>
            <td>TOTAL</td>
            <td>{{$vote_n + $vote_b + $vote_t}}</td>
            <td>{{$vote_tmas + $vote_nmas + $vote_nmas}}</td>
            <td>{{$vote_tfem + $vote_bfem + $vote_nfem}}</td>
        </tr>
    </tbody>
</table>