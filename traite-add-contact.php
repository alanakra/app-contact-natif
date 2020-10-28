<?php  
require 'start.php';


$contact_firstname = $_POST['contact_firstname'];
$contact_lastname = $_POST['contact_lastname'];
$contact_phone = $_POST['contact_phone'];

// $sql = "INSERT INTO contact (contact_id, contact_firstname, contact_lastname, contact_phone) VALUES ('',$contact_firstname,$contact_lastname,$contact_phone,'1')";

$sql = "INSERT INTO `contact` (`contact_id`, `contact_firstname`, `contact_lastname`, `contact_phone`, `ext_user_id`) VALUES (NULL, '$contact_firstname', '$contact_lastname', '$contact_phone', '1')";

$req = $db->prepare($sql);
$req->execute([$contact_firstname,$contact_lastname, $contact_phone]);

header("Location: index.php");

?>