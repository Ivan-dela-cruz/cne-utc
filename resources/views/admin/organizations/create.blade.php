@extends('admin.init.index')
@section('title','Crear organización')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('organizations.index')}}">Organizaciones</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')

    {!! Form::open(['url' => route('organizations.store'),'files' => true]) !!}
    @include('admin.organizations.partials.form')
    {!! Form::close() !!}
@endsection
