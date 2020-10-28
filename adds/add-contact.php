<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="container mt-3">
    <h1 class="text-center">Ajouter un nouveau contact</h1>
    
    <form action="traite-add-contact.php" method="POST">
    
       <div class="form-group">
            <label for="contact_firstname">Prénom</label>
            <input type="text" name="contact_firstname" class="form-control">
        </div>
        
        <br>
        
        <div class="form-group">
            <label for="contact_lastname">Nom</label>
            <input type="text" name="contact_lastname" class="form-control">
        </div>
        
        <br>
        
        <div class="form-group">
            <label for="contact_phone">Numéro de téléphone</label>
            <input type="text" name="contact_phone" class="form-control">
        </div>
        <br>
        <input type="submit" value="Ajouter"  class="btn btn-primary">
        <br>
        <br>
        <a href="index.php">Retour</a>
        
    </form>
    
    
</body>
</html>