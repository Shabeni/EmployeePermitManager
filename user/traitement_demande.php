<?php 
session_start();

if(isset($_POST['btn_ajouter'])):
//$_POST
include ('classe/autorisation.class.php');
$p=new Autorisation('localhost','root','','rh');
$p->date_demande=$_POST['date_demande'];
$p->alach='';
$p->date_debut=$_POST['date_debut'];
$p->date_fin=$_POST['date_fin'];
$p->description=($_POST['description']);
$p->etat='en attente';
$p->user_id=$_SESSION['id'];
$p->type_id=($_POST['type_id']);


if($p->create()) header('location:Demande.php?msg=1');
else echo 'Echec d\'ajout';
//var_dump($p);//print_r()
endif;

?>