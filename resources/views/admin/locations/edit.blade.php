@extends('admin.init.index')
@section('title','Editar Candidato')
@section('content')

    {!! Form::model($candidate,['url' => route('candidates.update',$candidate->id), 'method' => 'PUT','files'=>true]) !!}
    @include('admin.candidates.partials.form')
    {!! Form::close() !!}

@endsection
