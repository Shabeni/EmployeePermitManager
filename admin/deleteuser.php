<?php
if(isset($_GET['id'])):
//$_POST
include ('classe/user.class.php');
$p=new User('localhost','root','','rh');
$p->id=$_GET['id'];

if($p->delete()) header('location:listeEmploye.php?msg=1');
else echo 'Echec de Suppression';
//var_dump($p);//print_r()
endif;
?>