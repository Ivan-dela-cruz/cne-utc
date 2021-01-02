@extends('admin.init.index')
@section('title','Organizaciones')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('organizations.index')}}">Organizaciones</a>
    <span>Editar</span>
</div>
@endsection
@section('content')
    {!! Form::model($organization,['url' => route('organizations.update',$organization->id),'method' => 'PUT','files' => true]) !!}
    @include('admin.organizations.partials.form')
    {!! Form::close() !!}
@endsection
