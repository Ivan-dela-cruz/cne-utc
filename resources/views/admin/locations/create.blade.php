@extends('admin.init.index')
@section('title','Crear ubicación')
@section('content')

    {!! Form::open(['url' => route('locations.store'), 'method' => 'post']) !!}
    @include('admin.locations.partials.form')
    {!! Form::close() !!}

@endsection
