<?php 



session_start();

$error=false;

if(!empty($_POST["username"]) && !empty($_POST["password"]))
{

$conn=mysqli_connect("localhost","root","","sitohw1") or die("Errore : ".mysqli_connect_error());
$username=mysqli_real_escape_string($conn, $_POST['username']);
$password=mysqli_real_escape_string($conn, $_POST['password']);


$query="SELECT * FROM user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
$res= mysqli_query($conn,$query) or die(mysqli_error($conn));

if(mysqli_num_rows($res)>0){
    $entry = mysqli_fetch_assoc($res);
    //imposto una sessione all'utente

        $_SESSION["session_username"] = $entry['username'];
        $_SESSION["user_id"] = $entry['id'];
        if(isset( $_SESSION["user_id"])){
        header("Location: homerto.php");

        mysqli_free_result($res);
        mysqli_close($conn);
        exit;
        
   }
}else{
    $error=true;
    $error_message = "Non Sei Registrato O Hai sbagliato username/password";
}

}
else if (isset($_POST["username"]) || isset($_POST["password"])) {
    // Se solo uno dei due è impostato
    $error=true;
    $error_message = "Inserisci username e password.";
}


?>



<html>
<head>   
     <link rel="stylesheet" href="login.css ?ts=<?=time()?>&quot"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<nav id="nav_login">
        <div id="contenuto_log">
            <img id="img_logo" src="image/logo.gif">
           
        </div>
 <button id="btn_reg">Registrati</button>
    </nav>

</head>

<body>

    

    <meta charset="utf-8">
    <title>Login</title>


    
    
    <div id="contenuto">
    <div id="form_reg">
        <h1 id="login">Login</h1>
 

    <form name='nome_form' id="nome_form" action='login.php' method='post'> 

    <div id="contenuto_errori">
<?php if ($error): ?>
            <p class="error"><?php echo $error_message;?></p>
        <?php endif; ?>
</div>
        <div class='tabella'>&nbsp; <input class="reg" placeholder="Username" type='text' name='username'></div>
        <div class='pass'> &nbsp;
        <input class="reg" type='password' name='password'placeholder="Password" autocomplete="current-password" required="" id="id_password">
        <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer"></i></div>
        <div id="contenuto_btn"><input id="btn_log" type='submit' value='Accedi'></div>
</form>
</div>
</div>



<footer id="foot"> 
        <div id="contenuto_footer">
                
                <p id="scritta">Created By:<br>Domenico Sultano<br>Numero Matricola: 1000001926</p>
        </div>
</footer>

<script src="login.js ?ts=<?=time()?>&quot" defer="true"></script>
</body>
</html>