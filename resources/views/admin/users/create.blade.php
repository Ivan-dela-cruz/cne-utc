@extends('admin.init.index')
@section('title','Crear usuario')
@section('content')

    {!! Form::open(['url' => route('users.store'),'files' => true]) !!}
    @include('admin.users.partials.form')
    {!! Form::close() !!}

@endsection
