@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    <div class="col-md-9">
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <h3>Organizaciones políticas</h3>
                <a href="{{route('organizations.create')}}" class="new-dashboard-item">Nuevo</a>
            </div>

            @include('admin.organizations.table')
        </div>
    </div>
@endsection
