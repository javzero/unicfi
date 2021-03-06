@extends('layouts.web.main')
@section('title', config('app.name'). " | Galeria")

@section('styles')
@endsection

@section('content')

    <div class="container-fluid top-banner banner-galeria">
        <div class="main-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('webimages/logos/logo.png') }}" alt="UnicFi Logo"></a>
        </div>
    </div>
    @include('web.galeria.partials.filters')
    {{-- Content --}}
    <div class="container-fluid gallery-list">
        <div class="row">
            <div class="search-info">
                @if(isset($searchInfo))
                    {{ $searchInfo }}
                @endif
            </div>
            
            @if(!count($articles))
                <div class="container not-found">
                    <h3>No se encontraron imágenes</h3>
                    <hr>
                    <h4>Puede realizar una nueva búsqueda o  <a href="{{ route('web.galeria') }}"></i> <span class="all">verlas todas</span> </a></h4>
                </div>
            @endif
            
            <div class="col-md-12">
                <div class="row gallery-list">
                @foreach($articles as $article)
                    <a href="javascript:void(0)">
                        <div class="col-md-3 col-sm-3 col-xs-12 item">
                            <div class="image">
                                @if (count($article->images) >= 1)
                                    @if($article->thumb == null)
                                        <img src="{{ asset('webimages/main/gen/catalog-gen.jpg') }}" class="img-responsive" alt="">
                                    @else
                                        <img src="{{ asset('webimages/catalogoimg/'.$article->thumb) }}" class="img-responsive" alt="">
                                    @endif
                                @else
                                    <img src="{{ asset('webimages/main/gen/catalog-gen.jpg') }}" class="img-responsive" alt="">
                                @endif
                                {{-- <div class="overlay">
                                    <button class="btn"> Ver más...</button>
                                </div> --}}
                            </div>
                            {{-- @if(strlen(strip_tags($article->name)) > 140)
                                <div class="title"> {{ substr(strip_tags($article->name), 0 , 140) }} ...</div>
                            @else
                                <div class="title"> {{ $article->name }} </div>
                            @endif --}}
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
        </div>
        {!! $articles->render(); !!}
    </div>
    @include('layouts.web.partials.social')
    @include('layouts.web.partials.foot')
@endsection



   
