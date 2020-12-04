<div class="col-md-7">
    <!-- profile-edit-container-->
    <div class="profile-edit-container">
        <div class="profile-edit-header fl-wrap">
            <h4>Nueva organización</h4>
        </div>
        <div class="custom-form">
            <label>Nombre <i class="fa fa-user-o"></i></label>
            {!! Form::text('name',null, ['id'=>'name']) !!}
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label>Lista<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('list',null, ['id'=>'list']) !!}
            @error('list')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label>Siglas<i class="fa fa-phone"></i> </label>
            {!! Form::text('acronym',null, ['id'=>'acronym']) !!}
            @error('acronym')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label> Representante <i class="fa fa-map-marker"></i> </label>
            {!! Form::text('representative',null, ['id'=>'representative']) !!}
            @error('representative')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label> Asambleistas <i class="fa fa-globe"></i> </label>
            {!! Form::text('assembly_members',null, ['id'=>'assembly_members']) !!}
            @error('assembly_members')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label> Prefectos <i class="fa fa-globe"></i> </label>
            {!! Form::text('prefects',null, ['id'=>'prefects']) !!}
            @error('prefects')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label> Alcaldes <i class="fa fa-globe"></i> </label>
            {!! Form::text('mayors',null, ['id'=>'mayors']) !!}
            @error('mayors')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="edit-profile-photo fl-wrap">
        @if(isset($organization))
            <img src="{{asset($organization->url_image)}}" class="respimg" alt="">
        @else
            <img src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
        @endif

        <div class="change-photo-btn">
            <div class="photoUpload">
                <span><i class="fa fa-upload"></i> Subir foto</span>
                {!! Form::file('image', ['id'=>'image','class'=>'upload']) !!}
                @error('image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
    </div>
</div>
