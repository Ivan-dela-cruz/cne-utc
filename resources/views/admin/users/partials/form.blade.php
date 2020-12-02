<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            {!! Form::label('title', 'Título') !!}
            {!! Form::text('title',null, ['id'=>'title','class'=>'form-control']) !!}
            @error('title')
            <x-form message="{{$message }}"/>
            @enderror
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">

            <label class="mb-2" for="url_image">Imagen <small>(jpeg, png, jpg, gif)</small></label>
            <div class="text-center">
                <img id="show_img" src="@if(isset($course->url_image)){{asset($course->url_image)}}@endif" height="300">
            </div>
            {!! Form::file('url_image', ['id'=>'url_image','class'=>'form-control mt-2']) !!}

            @error('url_image')
            <x-form message="{{$message }}"/>
            @enderror
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            {!! Form::label('file_url', 'Certificado de Finalizacion (PDF)') !!}
            {!! Form::file('file_url', ['id'=>'file_url','class'=>'form-control']) !!}
            @error('file_url')
            <x-form message="{{$message }}"/>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('is_activated', 'Estado') !!}
            <div class="form-control">
                <div class="form-check form-check-inline">
                    <label>
                        {{ Form::radio('is_activated', 1) }} Activo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label>
                        {{ Form::radio('is_activated',0) }} Inactivo
                    </label>
                </div>
            </div>
            @error('is_activated')
            <x-form message="{{$message }}"/>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>


