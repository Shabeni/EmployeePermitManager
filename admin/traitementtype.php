<?php 
if(isset($_POST['btn_ajouter'])):
//$_POST
include ('classe/type.class.php');
$p=new Type('localhost','root','','rh');
$p->intitule=$_POST['intitule'];
$p->active=1;

if($p->create()) header('location:ajoutType.php');
else echo 'Echec d\'ajout';
//var_dump($p);//print_r()
endif;

?>