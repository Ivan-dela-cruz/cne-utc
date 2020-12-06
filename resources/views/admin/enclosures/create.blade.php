@extends('admin.init.index')
@section('title','candidates')
@section('content')

    {!! Form::open(['url' => route('enclosures.store'), 'method' => 'post','files'=>true]) !!}
    @include('admin.enclosures.partials.form')
    {!! Form::close() !!}

@endsection