@extends('admin.init.index')
@section('title','Crear cargo')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('positions.index')}}">Dignidades</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')

    {!! Form::open(['url' => route('positions.store'),'files' => true]) !!}
    @include('admin.positions.partials.form')
    {!! Form::close() !!}
@endsection