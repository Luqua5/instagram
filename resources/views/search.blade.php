@php $menu = 2; @endphp

@extends('layouts.connected')

@section('topMenu')

@if(isset($recherches))
<header>
    <form action="index.php?action=searchTrait" method="POST" id="form-search">
    <input type="text" value={{$recherches}} name="search" id="search" placeholder="Rechercher" >
    <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
    </form>
</header>

@else
<header>
    <form action="index.php?action=searchTrait" method="POST" id="form-search">
    <input type="text" name="search" id="search" placeholder="Rechercher" >
    <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
    </form>
</header>

@endif
@endsection


@section('content')

@if(isset($tags))

@forelse ($tags as $tag)


<div class="article">
<span class="nom"> {{$tag['login']}} </span>
<img src="{{$tag['img_url']}}">
<h3> {{$tag['titre']}} </h3>
<div class="dessous"> 
    <p>{{$tag['tags']}}</p> 
    <div class="icone"> <a href=""> <img src="public/images/message-rounded-dots-regular-24.png"> </a> <a href=""> <img src="public/images/heart-regular-24.png"> </a>  </div>

</div>

@empty

<p>Aucun article</p>

@endforelse

@endif


@endsection