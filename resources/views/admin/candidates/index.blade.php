@extends('admin.init.index')
@section('title','Candidates')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Lista de Candidatos</h3>
                <a href="{{ route('candidates.create')}}" class="new-dashboard-item">Nuevo</a>
            </div>
            @include('admin.candidates.tabla')
        </div>
    </div>
@endsection
