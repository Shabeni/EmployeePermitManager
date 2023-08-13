<?php 
if(isset($_GET['id'])):
include_once('classe/departement.class.php');
$p=new Departement('localhost','root','','rh');
$p->id=$_GET['id'];

    $p->Delete() ;header('location:listeDepartement.php?msg=1');




endif;


?>
