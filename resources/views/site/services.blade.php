@extends('master')
@section('content')

<section class="hero is-dark">
    <div class="hero-body">
      <div class="container">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a style="color: white;" href="{{url('/')}}">Accueil</a></li>
                <li><a style="color: white;" href="{{url('/blog')}}">Services</a></li>
            </ul>
          </nav>
        <h1 class="title">
            Nos Services
        </h1>
      </div>
    </div>
</section>
<div class="container">
        @foreach ($services->chunk(3) as $chunk)
            <div class="columns is-marginless">
                @foreach($chunk as $service)
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
                                <p class="title is-4">{{$service->title}}</p>
                                </div>
                            </div>
                        
                            <div class="content">
                                {{ Str::of($service->description)->limit(80)}}
                                <br>
                                <time>{{Carbon\Carbon::parse($service->created_at)->toFormattedDateString()}}</time>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
</div>
@endsection