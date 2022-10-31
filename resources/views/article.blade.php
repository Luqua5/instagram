@php $menu = 3; @endphp
@extends('layouts.connected')

@section('content')


@forelse ($articles as $article)


<div class="article">
<span class="nom"> {{$article['login']}} </span>
<img src="{{$article['img_url']}}">
<h3> {{$article['titre']}} </h3>
<div class="dessous"> 
    <p>{{$article['tags']}}</p> 
    <div class="icone"> <a href=""> <i class='bx bx-message-rounded-dots bx-lg'></i> </a> <a href=""> <i class='bx bx-heart bx-lg'> </i> </a>  </div>

</div>

@empty

<p>RIEN</p>

@endforelse
@endsection