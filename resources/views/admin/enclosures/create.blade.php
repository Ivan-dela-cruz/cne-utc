@extends('admin.init.index')
@section('title','candidates')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('enclosures.index')}}">Recintos</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')

    {!! Form::open(['url' => route('enclosures.store'), 'method' => 'post','files'=>true]) !!}
    @include('admin.enclosures.partials.form')
    {!! Form::close() !!}

@endsection