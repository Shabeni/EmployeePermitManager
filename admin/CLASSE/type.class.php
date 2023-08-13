<?php
//classe CRUD associée à la table SQL users(id,nom,email,role,matricule,actif,departement_id)
Class Type{
//attributs
public $id,$intitule,$active;
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
public function Create(){
	//Préparer puis exécuter la requête
	//users(id,nom,email,role,matricule,actif,departement_id)
 $sql="INSERT into types values(NULL,'$this->intitule','$this->active')";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
	
}


public function RetreiveById(){
	$sql="select * from types where id=$this->id";
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

public function RetreiveWithDataTables(){
	$sql="select * from types";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$types=$resultats->fetchall();
echo '<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '<thead>';
	echo '<tr>';
	echo '<th>ID</th><th>Intitule</th><th>Active</th><th>Actions</th>';
	echo '</tr>';
echo '</thead>';
print '<tbody>';
foreach($types as $type):
echo '<tr>';
	print '<td>'.$type->id.'</td>';
	print '<td>'.$type->intitule.'</td>';
	print '<td>'.$type->active.'</td>';
	if ($type->active == 1) {
		print '<td><a class="btn btn-danger" onClick="return confirm(\'Desactiver ce Type?\');" href="typebuttons.php?id='.$type->id.'&active=1">Desactiver</a></td>';
	} else {
		print '<td><a class="btn btn-success" onClick="return confirm(\'Activer ce Type?\');" href="typebuttons.php?id='.$type->id.'&active=0">Activer</a></td>';
	}

echo '</tr>';
endforeach;	
print '</tbody>';
echo '<tfoot>';
	echo '<tr>';
	echo '<th>ID</th><th>Intitule</th><th>Active</th><th>Actions</th>';
	echo '</tr>';
echo '</tfoot>';
echo '</table>';
}
	else echo 'Table vide !!!' ;
}

public function desactiver(){
    $sql = "UPDATE types SET active = 0 WHERE id = $this->id";
    $resultat = $this->cnx->exec($sql);
    if($resultat) {
        return true;
    } else {
        return false;
    }
}
public function activer(){
    $sql = "UPDATE types SET active = 1 WHERE id = $this->id";
    $resultat = $this->cnx->exec($sql);
    if($resultat) {
        return true;
    } else {
        return false;
    }
}










}


?>