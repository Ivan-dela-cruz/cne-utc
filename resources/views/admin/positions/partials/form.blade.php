<div class="col-md-7">
    <!-- profile-edit-container-->
    <div class="profile-edit-container">
        <div class="profile-edit-header fl-wrap">
            <h4>Nuevo Cargo</h4>
        </div>
        <div class="custom-form">
            <label> Ámbito politico <i class="fa fa-globe"></i> </label>
            {!! Form::select('indent', $list , null , ['class' => 'chosen-select']) !!}
            <label>Nombre <i class="fa fa-user-o"></i></label>
            {!! Form::text('name',null, ['id'=>'name','required'=>'required']) !!}
            @error('name')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
            <label>Descripción<i class="fa fa-envelope-o"></i> </label>
            {!! Form::text('description',null, ['id'=>'description','required'=>'required']) !!}
            @error('description')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror

            

            <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar<i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="edit-profile-photo fl-wrap">
        @if(isset($position))
        <img id="show_img" src="{{asset($position->url_image)}}" class="respimg" alt="">
    @else
        <img id="show_img" src="{{asset('assets/images/avatar/1.jpg')}}" class="respimg" alt="">
    @endif
        <div class="change-photo-btn">
            <div class="photoUpload">
                <span><i class="fa fa-upload"></i> Upload Photo</span>
                {!! Form::file('image', ['id'=>'url_image','class'=>'upload']) !!}
                @error('image')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
    </div>

</div>

