@extends('master')
@section('content')

<section class="hero is-dark">
    <div class="hero-body">
      <div class="container">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a style="color: white;" href="{{url('/')}}">Accueil</a></li>
                <li class="is-active"><a style="color: white;" href="#" aria-current="page">Blog</a></li>
            </ul>
          </nav>
        <h1 class="title">
          Mes derniers posts
        </h1>
      </div>
    </div>
</section>
<div class="container">

    <div class="columns is-marginless">
        <div class="column">
            <div class="tabs is-toggle is-fullwidth">
                <ul>

                    <li class="is-active">
                        <a href="{{url('/blog')}}">
                            <span>All</span>
                        </a>
                    </li>
                    @foreach($categories as $category)
                        <li>
                        <a href="{{url('/posts/'.$category->slug)}}">
                                <span>{{$category->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
              </div>
        </div>
    </div>

        @foreach ($posts->chunk(2) as $chunk)
            <div class="columns is-marginless">
                @foreach($chunk as $post)
                    <div class="column">
                        <div class="card">
                            <div class="card-image">
                            <figure class="image is-16by9">
                                <a href="{{asset('/blog/'.$post->slug)}}">
                                <img src="{{asset('/storage/'.$post->image)}}" alt="{{$post->title}}">
                                </a>
                                
                            </figure>
                            </div>
                            <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                <p class="title is-4">{{$post->title}}</p>
                                </div>
                            </div>
                        
                            <div class="content">
                                {{ Str::of($post->excerpt)->limit(60)}}
                                <small>
                                    <br>
                                <a href="{{url('/posts/'.$category->slug)}}">{{$post->category->name}}</a>
                                </small>
                                <br>
                                <time>{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</time>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="is-marginless columns">
            <div class="column is-half" align="left">
                @if(!($posts->currentPage()==1))
                    <a href="{{$posts->previousPageUrl()}}" class="button is-dark">
                        <span>Précédent</span>
                    </a>
                @endif
            </div>

            <div class="column is-half" align="right">
                @if($posts->hasMorePages())
                    <a href="{{$posts->nextPageUrl()}}" class="button is-dark">
                        <span>Suivant</span>
                    </a>
                @endif
            </div>
        </div>
</div>
@endsection