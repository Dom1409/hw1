<?php

    session_start();
    header('Content-Type: application/json');
    
    if(isset($_SESSION['user_id'])){

        $conn = mysqli_connect("localhost", "root", "", "sitohw1") or die("Errore : " . mysqli_connect_error());

        $user_id = $_SESSION['user_id'];

        $query="SELECT * FROM lista_desideri WHERE id_user='$user_id'";

        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

        $lista_desideri=array();

        while($row=mysqli_fetch_assoc($result)){

                $lista_desideri[]=$row;
        }
     

        echo json_encode($lista_desideri);
    }

?>