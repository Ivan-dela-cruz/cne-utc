@extends('admin.init.index')
@section('title','Editar Enclousure')
@section('content')

    {!! Form::model($enclosure,['url' => route('enclosures.update',$enclosure->id), 'method' => 'PUT','files'=>true]) !!}
    @include('admin.enclosures.partials.form')
    {!! Form::close() !!}

@endsection