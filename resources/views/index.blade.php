@php $menu = 1; @endphp
@extends('layouts.connected')

@section('content')

<div id='actu'> 
@forelse ($actus as $actu)

    <div class="article">
        <span class="nom"> {{$actu['login']}} </span>
        <img src="{{$actu['img_url']}}">
    </div>

@empty

<p>Il n'y a pas de publication</p>

@endforelse
</div>
@endsection