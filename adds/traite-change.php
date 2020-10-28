<?php 

require 'start.php';

// Test des éléments renvoyés
print_r($_POST);

$contactFirstName = htmlspecialchars($_POST['contact_firstname']);
$contactLastName = htmlspecialchars($_POST['contact_lastname']);
$contactPhone = htmlspecialchars($_POST['contact_phone']);
$id = htmlspecialchars($_POST['id']);

$sql = $db->prepare("UPDATE `contact` SET contact_firstname = ?, contact_lastname= ?, contact_phone= ? WHERE id= ?");
$sql -> execute(array($contactFirstName,$contactLastName,$contactPhone,$id));

if($sql)
{
 echo 'Yes';
}else {
 echo 'No';
}



// $req = $db->prepare($sql);
// $req->execute();
// header('Location:index.php');

?>
