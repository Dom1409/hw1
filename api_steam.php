<?php

    //ritorna risultati api

   header('Content-Type: application/json');

      

   function games(){
        
      session_start();
      if(isset($_POST['valore'])){
         
         $steam_id= $_POST['valore'];

         $url='https://store.steampowered.com/api/appdetails?appids=' . $steam_id;

         # Creo il CURL handle per l'URL selezionato
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         # Setto che voglio ritornato il valore, anziché un boolean (default)
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
         # Eseguo la richiesta all'URL
         $res = curl_exec($ch);
         # Impacchetto tutto in un JSON
         $json = json_decode($res, true);
         # Libero le risorse
         curl_close($ch);
         
         echo json_encode($json); 
      }
   }

   games();

   
?>