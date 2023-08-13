<?php 
if(isset($_POST['btn_ajouter'])):
//$_POST
include ('classe/user.class.php');
$p=new User('localhost','root','','rh');
$p->nom=$_POST['nom'];
$p->email=$_POST['email'];
$p->role=$_POST['role'];
$p->mdp=md5($_POST['pwd']);
$p->matricule=$_POST['matricule'];
$p->actif=1;
$p->departement_id=$_POST['departement_id'];

if($p->create()) header('location:ajoutEmploye.php');
else echo 'Echec d\'ajout';
//var_dump($p);//print_r()
endif;

?>