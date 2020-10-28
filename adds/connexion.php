<!DOCTYPE html>

<?php

//Démarrage de la session
session_start();

if(isset($_SESSION['id'])){
    header('Location: index.php');
}

//Connexion à la base de données
require "start.php";

//Si l'utilisateur appuie sur "Se connecter"
if(isset($_POST['submitbutton']))
{    //On crée des variables protégées
   $mailconnect = htmlspecialchars($_POST['user_mail']);
   $mdpconnect = htmlspecialchars($_POST['user_password']);

   //Si les champs ont bien remplis
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $db->prepare('SELECT * FROM users WHERE user_mail = ?');
        $requser -> execute(array($mailconnect));
        $userexist = $requser->rowCount();
        
        // Si l'email rentré est répertorié dans la base de données
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $hash = $userinfo['user_password'];
            if(password_verify($mdpconnect, $hash))
            {
                $_SESSION['id'] = $userinfo['user_id'];
                $_SESSION['user_email'] = $userinfo['user_mail'];
                $_SESSION['user_firstname'] = $userinfo['user_firstname'];
                $_SESSION['user_lastname'] = $userinfo['user_lastname'];
                header('Location: index.php');
            }else 
            {
                $message = 'Mot de passe incorrect';
            }

        }
        else
        {
            $message = 'Mot de passe ou email incorrect';
        }

    }
    else
    {
        $message = "Tous les champs doivent être complétés !";
    }
}

?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - App Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Connexion</h1>
        <a href="index.php">Retour</a>
        <form method="POST">
            <div class="form-group">
                <label>Mail</label>
                <input type="text" name="user_mail" class="form-control">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="user_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-info" name="submitbutton">Me connecter</button>
        </form>
        <?php
            //Si la variable $message est créee, on l'affiche
            if (isset($message))
            {
                echo '<font color="red">'.  $message . "</font>";
            }
            ?>
    </div>
</body>
</html>