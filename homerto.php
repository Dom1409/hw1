

<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>



<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="home.css ?ts=<?=time()?>&quot"/>
    
    <nav id="nav_login">
   
        <div id="contenuto_log">
            <img id="img_logo" src="image/logo.gif">
           
        </div>

 <button id="btn_logout">Logout</button>
    </nav>
 
</head>

<body>


   <h1 id="Home">SHOP</h1>

   <div class="box">
    <div class="container-2">
    <form id="searchForm">
      <i class="fa fa-search" id="icon"></i>
      <input type="search" id="search" placeholder="Search..." />
  </form>
    </div>
  </div>





        <section id="shop">
     

</section>

<div id=contenuto_btn_carica>
    <button id="btn_carica">Carica Altro</button>
  </div>

</body>
<script src="home.js ?ts=<?=time()?>&quot" defer="true"></script>
</html>