@extends('admin.init.index')
@section('title','Ubicaciones')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('locations.index')}}">Ubicaciones</a>
    <span>Listado</span>
</div>
@endsection
@section('content')
    <div class="col-md-9">
        @if (session('status'))
            @if (session('status')!="error")
                <div class="notification success fl-wrap">
                    <p>{{session('status')}}</p>
                    <a class="notification-close" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                </div>
            @else
                <div class="notification reject fl-wrap">
                    <p>Error al realizar la petición</p>
                    <a class="notification-close" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                </div>
            @endif
        @endif
        <div class="dashboard-list-box fl-wrap">
            <div class="dashboard-header fl-wrap">
                <div style="margin-top: 0px; margin-bottom: 10px; margin-left: -20px;" class="header-search">
                
                    {!! Form::open(['url' => route('locations.index'), 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
                    
                    <div style="width: 35%;" class="header-search-input-item">
                        <input style="width: 100%;"   @if (isset($keyword)) value="{{$keyword}}" @endif
                        type="text" placeholder="Buscar ubicaciones" name="keyword"/>
                    </div>
                    <div style="width: 20%;" class="header-search-select-item">
                        {!! Form::select('type', [
                            '1'=>"Provincia",
                            '2'=>"Cantón",
                            '3'=>"Parroquia"
                        ], $type, ['class'=>'chosen-select']) !!}
                    </div>
                    <button  type="submit" class="header-search-button" >Buscar</button>
                    {!! Form::close() !!}
                </div>
                @can('create_location')
                <a href="{{ route('locations.create')}}" class="new-dashboard-item">Nuevo</a>
                @endcan
            </div>
           
        </div>
        @if (count($locations)>0)
        <div class="container-table">
            @include('admin.locations.tabla')
        </div>
        {{$locations->links()}}
        @else
        <div class="text-center">
            <img height="320" src="{{asset('assets/images/select.jpg')}}" alt="">
            @if (isset($keyword))
                <h6>No se hallaron resultados para <b> "{{$keyword}}"</b> </h6>
            @endif   
        </div>
        @endif  
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var pathname = "?keyword={{$keyword}}&type={{$type}}";
            url = "{{route('locations.index')}}"+pathname+"&page="+page;
            window.location.href = url;
         
        });
        
    </script>
@endsection