<?php

session_start();


if (isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "", "sitohw1") or die("Errore : " . mysqli_connect_error());
    $user_id = $_SESSION['user_id'];

    $nome_g= $_POST['nome_elemento'];
    $query = "DELETE FROM lista_desideri WHERE id_user='$user_id' AND JSON_EXTRACT(content,'$.nome')='$nome_g'";

    $result = mysqli_query($conn, $query);

     echo json_encode($result);

    
} 
?>
