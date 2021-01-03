@extends('admin.init.index')
@section('title','Crear ubicación')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('locations.index')}}">Ubicaciones</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')

    {!! Form::open(['url' => route('locations.store'), 'method' => 'post']) !!}
    @include('admin.locations.partials.form')
    {!! Form::close() !!}

@endsection
