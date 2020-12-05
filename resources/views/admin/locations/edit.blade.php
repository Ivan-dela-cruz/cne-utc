@extends('admin.init.index')
@section('title','Editar Ubicación')
@section('content')

    {!! Form::model($location,['url' => route('locations.update',$location->id), 'method' => 'PUT']) !!}
    @include('admin.locations.partials.form')
    {!! Form::close() !!}

@endsection
