@extends('master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        {{$count=1}}
        @foreach ($slides as $slide)
            @if ($count==1)
                <div class="carousel-item active">
                <img src="{{asset('/storage/'.$slide->image)}}"  alt="New York" style=" height: 660px; width: 100%; ">
                <div class="carousel-caption">
                    <h3>{{$slide->title}}</h3>
                </div>   
                </div>
                {{$count=2}}
            @else
                <div class="carousel-item">
                <img src="{{asset('/storage/'.$slide->image)}}"  alt="New York" style=" height: 660px; width: 100%; " >
                <div class="carousel-caption">
                    <h3>{{$slide->title}}</h3>
                </div>   
                </div>
            @endif
            
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="is-divider" data-content="Nos services"></div>
    <div class="columns is-marginless">
        @foreach($services as $service)
                    <div class="column">
                        <div class="card">
                            <div class="card-image">
                            <figure class="image is-16by9">
                                <a href="{{asset('/service/'.$service->id)}}">
                                    <img src="{{asset('/storage/'.$service->image)}}" alt="Placeholder image">
                                </a>
                                
                            </figure>
                            </div>
                            <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                <p class="title is-5">{{$service->title}}</p>
                                </div>
                            </div>
                              <button class="button is-warning"> Voir plus</button>
                            
                            </div>
                        </div>
                    </div>
                @endforeach
      </div>
      
  </div>
  <br>
  <br>
  <br>
        <div class="is-divider" data-content="Nos actualités"></div>
  <section class="hero is-dark">
    <div class="hero-body">
      <div class="container">
      @foreach ($posts->chunk(2) as $chunk)
            <div class="columns is-marginless">
                @foreach($chunk as $post)
                    <div class="column">
                        <div class="card">
                            <div class="card-image">
                            <figure class="image is-16by9">
                                <a href="{{asset('/blog/'.$post->id)}}">
                                    <img src="{{asset('/storage/'.$post->image)}}" alt="Placeholder image">
                                </a>
                                
                            </figure>
                            </div>
                            <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                <p class="title is-4" style="color: #424242;">{{$post->title}}</p>
                                </div>
                            </div>
                        
                            <div class="content">
                                {{ Str::of($post->excerpt)->limit(50)}}
                                <br>
                                <time>{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</time>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/bst.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bulma-divider.min.css') }}">

@endsection

@section('javascripts')
<script src="{{ asset('js/bst.min.js') }}"></script>


@endsection