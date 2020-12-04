@extends('admin.init.index')
@section('title','Crear organización')
@section('content')

    {!! Form::open(['url' => route('organizations.store'),'files' => true]) !!}
    @include('admin.organizations.partials.form')
    {!! Form::close() !!}
@endsection
