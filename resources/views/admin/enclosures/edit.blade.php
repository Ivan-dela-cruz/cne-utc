@extends('admin.init.index')
@section('title','Editar Enclousure')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('enclosures.index')}}">Recintos</a>
    <span>Editar</span>
</div>
@endsection
@section('content')

    {!! Form::model($enclosure,['url' => route('enclosures.update',$enclosure->id), 'method' => 'PUT','files'=>true]) !!}
    @include('admin.enclosures.partials.form')
    {!! Form::close() !!}

@endsection