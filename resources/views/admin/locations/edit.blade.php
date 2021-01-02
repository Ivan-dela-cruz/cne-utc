@extends('admin.init.index')
@section('title','Editar Ubicación')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('locations.index')}}">Ubicaciones</a>
    <span>Editar</span>
</div>
@endsection
@section('content')

    {!! Form::model($location,['url' => route('locations.update',$location->id), 'method' => 'PUT']) !!}
    @include('admin.locations.partials.form')
    {!! Form::close() !!}

@endsection
