@extends('admin.init.index')
@section('title','Editar Candidato')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('candidates.index')}}">Candidatos</a>
    <span>Editar</span>
</div>
@endsection
@section('content')

    {!! Form::model($candidate,['url' => route('candidates.update',$candidate->id), 'method' => 'PUT','files'=>true]) !!}
    @include('admin.candidates.partials.form')
    {!! Form::close() !!}

@endsection
