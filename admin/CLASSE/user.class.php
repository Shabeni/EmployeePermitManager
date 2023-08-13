<?php
//classe CRUD associée à la table SQL users(id,nom,email,role,matricule,actif,departement_id)
Class User{
//attributs
public $id,$nom,$email,$role,$mdp,$matricule,$actif,$departement_id;
private $cnx,$server,$user,$pwd,$db;

//Public Methods

public function __construct($serveur,$utilisateur,$mdp,$base){
	//connexion à la base de données
	$this->server=$serveur;
	$this->user=$utilisateur;
	$this->pwd=$mdp;
	$this->db=$base;
	try
	{
	$this->cnx = new PDO('mysql:host='.$this->server.'; dbname='.$this->db, $this->user, $this->pwd);
	}
	catch(Exception $e)
	{
	echo'Erreur:'.$e->getMessage().'<br/>';
	echo'N°:'.$e->getCode();
	}
}
public function isUser(){
$sql="select * from users where email='$this->email' and pwd='$this->mdp'";
$resultat=$this->cnx->query($sql);
if($resultat->rowCount()>0) {// s'il y a des données à afficher
$resultat->setFetchMode(PDO::FETCH_OBJ);
$user=$resultat->fetch();//objet qui contient les infos de cet utilisateur
return $user;
}
else {
return false;	
}
}
public function Update(){
	$sql="update users set nom='$this->nom', email='$this->email',role='$this->role', matricule='$this->matricule',actif=$this->actif,departement_id=$this->departement_id where id=$this->id";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
}
public function RetreiveById(){
	$sql="select * from users where id=$this->id";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$employe=$resultats->fetch();
return $employe;
}
	else return false;
}


public function Create(){
	//Préparer puis exécuter la requête
	//users(id,nom,email,role,matricule,actif,departement_id)
PRINT $sql="INSERT into users values(NULL,'$this->nom','$this->email','$this->role','$this->mdp','$this->matricule','$this->actif','$this->departement_id')";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
	
}
public function Delete(){
	$sql="delete from users where id=$this->id";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
}
public function RetreiveWithDataTables(){
	$sql="select * from users ";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$users=$resultats->fetchall();
echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '<thead>';
	echo '<tr>';
	echo '<th>ID</th><th>Nom</th><th>Email</th><th>Role</th><th>Matriucle</th><th>Actif</th><th>Departement</th><th>Cellule1</th><th>Cellule2</th>';
	echo '</tr>';
echo '</thead>';
echo '<tfoot>';
	echo '<tr>';
	echo '<th>ID</th><th>Nom</th><th>Email</th><th>Role</th><th>Matricule</th><th>Actif</th><th>Departement</th><th>Cellule1</th><th>Cellule2</th>';
	echo '</tr>';
echo '</tfoot>';
print '<tbody>';
foreach($users as $user):
echo '<tr>';
	print '<td>'.$user->id.'</td>';
	print '<td>'.$user->nom.'</td>';
	print '<td>'.$user->email.'</td>';
	print '<td>'.$user->role.'</td>';
	print '<td>'.$user->matricule.'</td>';
	print '<td>'.$user->actif.'</td>';
	print '<td>'.$user->departement_id.'</td>';
	print '<td><a class="btn btn-danger btn-circle btn-sm" onClick="return confirm(\'Vous êtes sur ?\');" href="deleteuser.php?id='.$user->id.'"><i class="fas fa-trash"></i></a></td>';
	print '<td><a  class="btn btn-success btn-square btn-sm"href="modifyuser.php?id='.$user->id.'">
	<i class="fas fa-edit"></i></a></td>';
echo '</tr>';
endforeach;	
print '</tbody>';

echo '</table>';
}
	else echo 'Table vide !!!' ;
}

/*
public function Retreive(){
	$sql="select * from users";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$users=$resultats->fetchall();
echo '<table>';
echo '<tr>';
echo '<th>ID</th><th>Nom</th><th>Email</th><th>Adresse</th>';
echo '</tr>';
foreach($users as $personne):
echo '<tr>';
	print '<td>'.$personne->id.'</td>';
	print '<td>'.$personne->nom.'</td>';
	print '<td>'.$personne->email.'</td>';
	print '<td>'.$personne->adresse.'</td>';
	print '<td><a onClick="return confirm(\'Vous êtes sur ?\');" href="deletePersonne.php?id='.$personne->id.'">Supprimer</a></td>';
	print '<td><a href="updatePersonne.php?id='.$personne->id.'">Modifier</a></td>';
echo '</tr>';
endforeach;	
echo '</table>';
}
	else echo 'Table vide !!!' ;
}
public function findByID(){
	$sql="select * from users where id=$this->id";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$personne=$resultats->fetch();
return $personne;
}
	else return false;
}
public function Update(){
	$sql="update users set nom='$this->nom', email='$this->email',
	adresse='$this->adresse' where id=$this->id";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
}
public function Delete(){
	$sql="delete from users where id=$this->id";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
}*/
}


?>