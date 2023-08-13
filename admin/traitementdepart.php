<?php 
if(isset($_POST['btn_ajouter'])):
//$_POST
include ('classe/departement.class.php');
$p=new Departement('localhost','root','','rh');
$p->nom=$_POST['nom'];
$p->actif=1;

if($p->create()) header('location:ajoutDepart.php');
else echo 'Echec d\'ajout';
//var_dump($p);//print_r()
endif;

?>


