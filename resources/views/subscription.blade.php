@extends('layouts.connected')

@section('topMenu')

@if(isset($recherches))
    <header>
        <form action="index.php?action=subscription" method="POST" id="form-search">
        <input type="text" value={{$recherches}} name="search" id="search" placeholder="Rechercher" >
        <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
        </form>
    </header>

@else
    <header>
        <form action="index.php?action=subscription" method="POST" id="form-search">
        <input type="text" name="search" id="search" placeholder="Rechercher" >
        <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
        </form>
    </header>

@endif
@endsection


@section('content')
@if(isset($searchAbos))
<div id="maRecherche">

    <h1>Ma recherche</h1>
    @foreach($searchAbos as $searchAbo)
        <div class="resultat">
            <div>
                <h2>{{$searchAbo['login']}}</h2>
                @if(isset($searchAbo['dateAbonnement']))
                <p>Depuis le @php $date = new DateTime($searchAbo['dateAbonnement']); echo $date->format('d F Y');   @endphp</p>
                @endif
            </div>
            @if($searchAbo['idAmi'] == $_SESSION['id'])
                <a href='index.php?action=delFriend&id={{$searchAbo['id']}}'> Se désabonner </a>
            @else
                <a href='index.php?action=addFriend&id={{$searchAbo['id']}}'> S'abonner </a>
            @endif
        </div>

        </form>
    @endforeach
</div>
@endif


<div id="mesAbonnement">

<h1>Mes abonnements</h1>
@if(isset($abos))
    @forelse($abos as $abo)
        <form action="index.php?action=subscription" method="POST">
        <div class="resultat">

            <div>
                <h2>{{$abo['login']}}</h2>
                <p>Depuis le @php $date = new DateTime($abo['dateAbonnement']); echo $date->format('d F Y');   @endphp</p>
            </div>

            <a href='index.php?action=delFriend&id={{$abo['id']}}'> Se désabonner </a>
        </div>

        </form>
    @empty

        Pas d'abonnement



    @endforelse
@endif

</div>



@endsection