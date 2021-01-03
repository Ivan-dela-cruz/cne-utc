@extends('admin.init.index')
@section('title','Editar usuario')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('users.index')}}">Usuarios</a>
    <span>Editar</span>
</div>
@endsection
@section('content')

    {!! Form::model($user,['url' => route('users.update',$user->id),'method' => 'PUT','files' => true]) !!}
    @include('admin.users.partials.form')
    {!! Form::close() !!}

@endsection
