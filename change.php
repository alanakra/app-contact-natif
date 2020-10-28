<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="container">

<?php 
require 'start.php';
$id = $_GET['id'];
$req= 'SELECT * FROM contact WHERE contact_id='.$id;
$stmt = $db->query($req);
$results = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1 class="text-center m-3">Modifier le contact</h1>
 
<form action="traite-change.php?id<?php echo $id ?>" method="POST">

    <input type="hidden" name="id" value="<?php echo $results['contact_id']?>">

    <div class="form-group">
        <label for="">Prénom</label>
        <input type="text" class="form-control" name="contact_firstname" value="<?php echo $results['contact_firstname']?>">
    </div>

    <div class="form-group">
        <label for="">Nom</label>
        <input type="text" class="form-control" name="contact_lastname" value="<?php echo $results['contact_lastname']?>">
    </div>

    <div class="form-group">
        <label for="">Téléphone</label>
        <input type="text" class="form-control" name="contact_phone" value="<?php echo $results['contact_phone']?>">
    </div>

    <input type="submit" class="btn btn-info" value="Modifier">
</form>


<a href="index.php">Retour</a>




</body>
</html>
