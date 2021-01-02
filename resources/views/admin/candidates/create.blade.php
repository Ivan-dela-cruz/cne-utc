@extends('admin.init.index')
@section('title','candidates')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('candidates.index')}}">Candidatos</a>
    <span>Nuevo</span>
</div>
@endsection
@section('content')

    {!! Form::open(['url' => route('candidates.store'), 'method' => 'post','files'=>true]) !!}
    @include('admin.candidates.partials.form')
    {!! Form::close() !!}

@endsection
