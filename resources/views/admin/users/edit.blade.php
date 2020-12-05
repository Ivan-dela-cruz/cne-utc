@extends('admin.init.index')
@section('title','Editar usuario')
@section('content')

    {!! Form::model($user,['url' => route('users.update',$user->id),'method' => 'PUT','files' => true]) !!}
    @include('admin.users.partials.form')
    {!! Form::close() !!}

@endsection
