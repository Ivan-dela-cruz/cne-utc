@extends('admin.init.index')
@section('title','Votos')
@section('position')
<div class="breadcrumbs">
    <a href="{{route('admin')}}">Home</a>
    <a href="{{route('votes.index')}}">Votos</a>
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
                <div class="custom-form">
                    
                    <div  class="row block-div">
                            
                        <div class="col-md-4">
                            <select  data-placeholder="All Categories" class="chosen-select-canton">
                        
                                @foreach($cantons as $canton)
                                    <option value="{{$canton->id}}">{{$canton->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-8">
                            <select   data-placeholder="All Categories" class="chosen-select-parish">
                                    @include('web.selects.parishes')
                            </select>
                        </div>
    
                        <div class="col-md-12">
                            <select  data-placeholder="All Categories" class="chosen-select-enclosure">
                            
                                @include('web.selects.enclosures')
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select  data-placeholder="All Categories" class="chosen-select-gender">
                                <option value="meeting_fem">F</option>
                                <option value="meeting_mas">M</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select  data-placeholder="All Categories" class="chosen-select-meeting">
                            
                            @include('web.selects.meeting')
                            </select>
                        </div>
                        <div class="col-md-6">
                            {!! Form::select('indent', $list , null , ['class' => 'chosen-select-pos']) !!}
                        </div>
                       
                        <div class="col-md-8">
                            <button hidden style="width: 100%;" type="button" class="btn  big-btn  color-bg flat-btn btn-search-vote">Buscar<i
                                class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
       
        <div class="container-table votes-table">
           
        </div>
       
       
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