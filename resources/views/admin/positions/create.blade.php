@extends('admin.init.index')
@section('title','Crear cargo')
@section('content')

    {!! Form::open(['url' => route('positions.store'),'files' => true]) !!}
    @include('admin.positions.partials.form')
    {!! Form::close() !!}
@endsection