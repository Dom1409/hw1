<?php 
    session_start();


    require_once 'conn.php';
    $error = false;

    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["confirm_password"])) {
        if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["confirm_password"])) {


            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $username_query = "SELECT username FROM user where username ='$username'";
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

            $res = mysqli_query($conn, $username_query);
            if (mysqli_num_rows($res) == 0) {

               

                if ($password === $confirm_password) {
                    // Verifica che la password soddisfi i requisiti specificati
                    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
                        $query = "INSERT INTO user (nome, cognome, username, password) VALUES ('$nome', '$cognome', '$username', '$password')";
                        mysqli_query($conn, $query) or die("Errore: " . mysqli_error($conn));
                        $_SESSION["session_username"] = $_POST['username'];
                        $_SESSION["user_id"] = mysqli_insert_id($conn);
                        mysqli_close($conn);
                        header("Location: login.php");
                        exit;
                    } else {
                        $error = true;
                        $error_message = "La password deve avere almeno 8 caratteri, una lettera maiuscola, una lettera minuscola e un numero.";
                    }
                } else {
                    $error = true;
                    $error_message = "Le password non coincidono.";
                }
            } else { 
                $error = true;
                $error_message = "Nome utente già in uso!";
            }
        }
    }
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<nav id="nav_login">
        <div id="contenuto_log">
            <img id="img_logo" src="image/logo.gif">
           
        </div>
 <button id="btn_indietro">Torna al Login</button>
    </nav>

</head>

<body>


    <meta charset="utf-8">
    <title>Registrazione</title>
    <link rel="stylesheet" href="registrazione.css ?ts=<?=time()?>&quot"/>


    <div id="contenuto">

    <div id="form_reg">
    <h1 id="registrazione">Registrazione</h1>
<form  id="nome_form"name='nome_form' action='registrazione.php' method='post'> 

<div id="contenuto_errori">
<?php if ($error): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
</div>

    <div class='tabella'><input class="reg" type='text' name='nome' placeholder="Nome"></div>
    <div class='tabella'> <input class="reg" type='text' name='cognome' placeholder="Cognome"></div>
    <div class='tabella'> <input class="reg" type='text' id="username" name='username' placeholder="Username"></div>
    <div class='tabella'><input class="reg" type='password' name='password' placeholder="Password"></div>
    <div class='tabella'><input class="reg" type='password' name='confirm_password'placeholder="Conferma Password"></div>
    <div  id="contenuto_btn"><input type='submit'id="btn_regi"  value="Registrati"></div>
</form>
</div>
</div>


<script src="registrazione.js ?ts=<?=time()?>&quot" defer="true"></script>
</body>
</html>