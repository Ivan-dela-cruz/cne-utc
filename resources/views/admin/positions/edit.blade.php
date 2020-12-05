@extends('admin.init.index')
@section('title','Editar Cargo')
@section('content')
    {!! Form::model($position,['url' => route('positions.update',$position->id),'method' => 'PUT','files' => true]) !!}
    @include('admin.positions.partials.form')
    {!! Form::close() !!}
@endsection