@extends('admin.init.index')
@section('title','Organizaciones')
@section('content')
    {!! Form::model($organization,['url' => route('organizations.update',$organization->id),'method' => 'PUT','files' => true]) !!}
    @include('admin.organizations.partials.form')
    {!! Form::close() !!}
@endsection
