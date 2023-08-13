<?php 
if(isset($_GET['id'])):
include_once('classe/type.class.php');
$p=new Type('localhost','root','','rh');
$p->id=$_GET['id'];
if (isset($_GET['active']) && $_GET['active'] == '1') {
    $p->desactiver() ;header('location:listeType.php');
} else {
    $p->activer()  ;header('location:listeType.php');
}



endif;


?>
