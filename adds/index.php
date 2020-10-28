<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="container">
    <?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: connexion.php');
    }

    require "start.php";
    // $req= "SELECT * FROM contact";
    $id_user = $_SESSION['id'];
    
     //Pour afficher les contacts après connexion
     $req = "SELECT t1.* FROM contact t1, users t2 WHERE t1.ext_user_id =. t2.user_id AND t1.ext_user_id =".$id_user;
     $stmt = $db->query($req);
     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


     $req_user = 'SELECT * FROM users WHERE user_id='.$id_user;
     $stmt_user = $db->query($req_user);
     $results_user = $stmt_user->fetch(PDO::FETCH_ASSOC);
    ?>

<?php 
    if (!isset($_SESSION["user_id"])){
        ?>
            <div class="container d-flex align-items-center mt-5">
                <a href="disconnect.php" class="btn btn-danger">Déconnexion</a>
            </div>
        <?php
        } else {
        ?>
                <div class="container mt-5 mb-3">
                    <a class="btn btn-info mr-1" href="connexion.php">Me connecter</a>
                </div>
        <?php
        }
        ?>

    <h1>Liste des contacts de <?php echo ucfirst($results_user['user_firstname'])?> <?php echo ucfirst($results_user['user_lastname']) ?></h1>
    <table class="container table">
        <thead>
            <tr>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Numéro</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
           <?php 
        foreach ($results as $row) :
          $id= $row["contact_id"];
          echo '<tr><td>'.$row['contact_firstname'].'</td><td>'.$row['contact_lastname'].'</td><td>'.$row['contact_phone'].'</td><td><a href="change.php?id='.$id.'">Modifier</a></td><td><a href="delete.php?id='.$id.'">Supprimer</a></td>';
        endforeach;
  ?>
        </tbody>
    </table>

    <a href="Add-contact.php">
    Ajouter un contact
    </a>
</body>

</html>