@extends('admin.init.index')
@section('title','Editar Cargo')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('positions.index')}}">Dignidades</a>
    <span>Editar</span>
</div>
@endsection
@section('content')
    {!! Form::model($position,['url' => route('positions.update',$position->id),'method' => 'PUT','files' => true]) !!}
    @include('admin.positions.partials.form')
    {!! Form::close() !!}
@endsection