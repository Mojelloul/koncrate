@extends('master')
@section('content')
<section class="hero is-dark">
    <div class="hero-body">
      <div class="container">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li><a style="color: white;" href="{{url('/')}}">Accueil</a></li>
                <li><a style="color: white;" href="#">A propos</a></li>
                <li class="is-active"><a style="color: white;" href="#" aria-current="page">{{$page->title}}</a></li>
            </ul>
          </nav>
        <h1 class="title">
            {{$page->title}}
        </h1>
        <h4 class="subtitle">{{$page->excerpt}} </h4>
      </div>
    </div>
</section>

<div class="is-divider" data-content="A propos"></div>

    <div class="columns">
        <div class="column">
            {!!$page->body!!}
        </div>
    </div>


@endsection
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/bulma-divider.min.css') }}">

@endsection
