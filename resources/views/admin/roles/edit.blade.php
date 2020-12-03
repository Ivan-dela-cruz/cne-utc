@extends('admin.init.index')
@section('title','Editar rol')
@section('content')
    <div class="col-md-9">
        <div class="profile-edit-container">
            <div class="profile-edit-header fl-wrap">
                <h4>Editar rol</h4>
            </div>
            <div class="custom-form">
                {!! Form::model($role, ['url' => route('roles.update',$role->id), 'method' => 'PUT']) !!}
                @include('admin.roles.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
