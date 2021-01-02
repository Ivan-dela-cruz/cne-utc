@extends('admin.init.index')
@section('title','Crear usuario')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('users.index')}}">Usuarios</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')

    {!! Form::open(['url' => route('users.store'),'files' => true]) !!}
    @include('admin.users.partials.form')
    {!! Form::close() !!}

@endsection
