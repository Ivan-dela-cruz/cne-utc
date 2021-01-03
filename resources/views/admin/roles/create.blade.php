@extends('admin.init.index')
@section('title','Crear rol')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('roles.index')}}">Roles</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')
    <div class="col-md-9">
        <div class="profile-edit-container">
            <div class="profile-edit-header fl-wrap">
                <h4>Nuevo rol</h4>
            </div>
            <div class="custom-form">
                {!! Form::open(['url' => route('roles.store')]) !!}
                @include('admin.roles.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
