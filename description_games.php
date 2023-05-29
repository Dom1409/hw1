<?php
session_start();

if (isset($_POST['nome']) && isset($_SESSION['user_id'])){

    $conn=mysqli_connect("localhost","root","","sitohw1") or die("Errore : ".mysqli_connect_error());

    $name=mysqli_real_escape_string($conn,$_POST['nome']);
    $image=$_POST['image'];
  
    $user_id=$_SESSION['user_id'];

    $query="INSERT INTO lista_desideri (id_user, content) VALUES('$user_id', JSON_OBJECT('nome', '$name','image','$image'))";

    error_log($query);

    mysqli_query($conn, $query) or die(mysqli_error($conn));

}


?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="description_games.css ?ts=<?=time()?>&quot"/>
    
</head>

<body>

<nav id="nav_description">
        
        <button id="btn_home">Home</button>
          <button id="btn_desideri">Aggiungi lista desideri</button>
          <button id="btn_visualizza_desideri">Visualizza lista desideri</button>

        </nav>
   
    
    <section id="contenuto">

</section>
</body>
<script src="description_games.js ?ts=<?=time()?>&quot"></script>
</html>