@extends('layouts.connected')

@section('content')

    <p id="inspi">Une inspiration, une humeur ?</p>
    <p id="partagez">Partagez...</p>

    <form action="index.php?action=publishTrait" class="form_co" method="POST" enctype="multipart/form-data">
            <h3> <input type="text" name="titre" id="titre" placeholder="Titre de la publication" required/> </h3>
            <label for="publier" class="custom-file-upload">
            Charger une image            
            </label>    
            <input type="file" value="publier" name="publier" id="publier" accept="image/*">

            <h3> <input type="text" name="tags" id="tags" placeholder="Tags" pattern="^#[a-z0-9_]+(( )+#[a-z0-9_]+)*( )*$" required/> </h3>

            <input type="submit" value="Publier" name="connecter" >



    </form>



@endsection