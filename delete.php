<?php 

require 'start.php';

$id = $_GET['id'];
$sql = "DELETE FROM `contact` WHERE `contact`.`contact_id` = ".$id;
$req = $db->prepare($sql);
$req->execute();

header("Location: index.php");
?>

