<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link href="./public/css/normalize.css" rel="stylesheet">
    <link href="./public/css/style2.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<body>
  <div id="tout">
    @section('topMenu')
      <header>
        <h1>Instagram</h1>
        <div id="image">
            <a href="index.php?action=subscription"> <i class='bx bx-user-plus bx-lg'> </i> </a>
            <a href="index.php?action=publish"> <i class='bx bx-paper-plane bx-lg'> </i> </a>
        </div>  
      </header>
    @show
    
      <section>
        @yield('content')
      </section>

      <footer>
        @if(isset($menu) && $menu == 1)
        <a href="index.php?action=index" class="active"> <i class='bx bx-home bx-lg'> </i> </a>
        @else 
        <a href="index.php?action=index"> <i class='bx bx-home bx-lg'> </i> </a>
        @endif

        @if(isset($menu) && $menu == 2)
        <a href="index.php?action=search" class="active"><i class='bx bx-search bx-lg'> </i> </a>
        @else 
        <a href="index.php?action=search" class=><i class='bx bx-search bx-lg'> </i> </a>
        @endif

        @if(isset($menu) && $menu == 3)
        <a href="index.php?action=article" class="active"><i class='bx bx-user bx-lg'> </i> </a>
        @else
        <a href="index.php?action=article"><i class='bx bx-user bx-lg'> </i> </a>
        @endif

        <a href="index.php?action=logout"><i class='bx bx-log-out-circle bx-lg'> </i> </a>
     
      </footer>
  </div>
</body>
</html>