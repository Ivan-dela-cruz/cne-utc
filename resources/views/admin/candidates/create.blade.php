@extends('admin.init.index')
@section('title','candidates')
@section('content')

    {!! Form::open(['url' => route('candidates.store'), 'method' => 'post','files'=>true]) !!}
    @include('admin.candidates.partials.form')
    {!! Form::close() !!}

@endsection
