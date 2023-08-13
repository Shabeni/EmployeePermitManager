<?php
//classe CRUD associée à la table SQL users(id,nom,email,role,matricule,actif,departement_id)
Class Autorisation{
//attributs
public $id,$date_demande,$alach,$date_debut,$date_fin,$description,$etat,$user_id,$type_id;
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

/*
public function RetreiveAnimated(){
	$sql="select * from personnes";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$personnes=$resultats->fetchall();
echo '<ul id="paragraphe">';
foreach($personnes as $personne):
echo '<li>';
	print '<h2>'.$personne->nom.'</h2>';
	print '<span>+</span>';
	print '<p>ID : '.$personne->id.'</p>';
	print '<p>Email : '.$personne->email.'</p>';
	print '<p>Adresse : '.$personne->adresse.'</p>';
	print '<p><a onClick="return confirm(\'Vous êtes sur ?\');" href="deletePersonne.php?id='.$personne->id.'">Supprimer</a></p>';
	print '<p><a href="updatePersonne.php?id='.$personne->id.'">Modifier</a></p>';
echo '</li>';
endforeach;	
echo '</ul>';
}
	else echo 'Table vide !!!' ;
}
*/


public function RetreiveById(){
	$sql="select * from autorisations where id=$this->id";
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
		$sql="select * from autorisations where etat='en attente' ";
	$resultats=$this->cnx->query($sql);
	if($resultats) {// s'il y a des données à afficher
	//la variable $resultats est de type resultSet
	//Convertir $resultats en Tableaux
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	$autorisations=$resultats->fetchall();
	echo '<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
	echo '<thead>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user_id</th><th>type_id</th><th>cellule1</th>';
		echo '</tr>';
	echo '</thead>';
	print '<tbody>';
	foreach($autorisations as $autorisation):
	echo '<tr>';
		print '<td>'.$autorisation->id.'</td>';
		print '<td>'.$autorisation->date_demande.'</td>';
		print '<td>'.$autorisation->date_debut.'</td>';
		print '<td>'.$autorisation->date_fin.'</td>';
		print '<td>'.$autorisation->description.'</td>';
		print '<td>'.$autorisation->etat.'</td>';
		print '<td>'.$autorisation->user_id.'</td>';
		print '<td>'.$autorisation->type_id.'</td>';
		print '<td><a class="btn btn-info btn-circle btn-sm" ;" href="traitDemande.php?id='.$autorisation->id.'"><i class="fas fa-info-circle"></i></a></td>';

	
	echo '</tr>';
	endforeach;	
	print '</tbody>';
	echo '<tfoot>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user_id</th><th>type_id</th><th>cellule1</th>';
		echo '</tr>';
	echo '</tfoot>';
	echo '</table>';
	}
		else echo 'Table vide !!!' ;
	}

	public function Retreivesapprouvee(){
		$sql="select *,autorisations.id as autorisation_id from autorisations INNER JOIN users ON autorisations.user_id = users.id INNER JOIN types ON autorisations.type_id = types.id  where etat='Approuvée' ";
	$resultats=$this->cnx->query($sql);
	if($resultats) {// s'il y a des données à afficher
	//la variable $resultats est de type resultSet
	//Convertir $resultats en Tableaux
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	$autorisations=$resultats->fetchall();
	echo '<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
	echo '<thead>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user</th><th>type</th><th>Alach</th>';
		echo '</tr>';
	echo '</thead>';
	print '<tbody>';
	foreach($autorisations as $autorisation):
	echo '<tr>';
		print '<td>'.$autorisation->autorisation_id.'</td>';
		print '<td>'.$autorisation->date_demande.'</td>';
		print '<td>'.$autorisation->date_debut.'</td>';
		print '<td>'.$autorisation->date_fin.'</td>';
		print '<td>'.$autorisation->description.'</td>';
		print '<td>'.$autorisation->etat.'</td>';
		print '<td>'.$autorisation->nom.'</td>';
		print '<td>'.$autorisation->intitule.'</td>';
		print '<td>'.$autorisation->alach.'</td>';
		

	
	echo '</tr>';
	endforeach;	
	print '</tbody>';
	echo '<tfoot>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user</th><th>type</th><th>Alach</th>';
		echo '</tr>';
	echo '</tfoot>';
	echo '</table>';
	}
		else echo 'Table vide !!!' ;
	}
	
	
	public function Retreivesrejetee(){
		$sql="select *,autorisations.id as autorisation_id from autorisations INNER JOIN users ON autorisations.user_id = users.id INNER JOIN types ON autorisations.type_id = types.id  where etat='Rejetée' ";
	$resultats=$this->cnx->query($sql);
	if($resultats) {// s'il y a des données à afficher
	//la variable $resultats est de type resultSet
	//Convertir $resultats en Tableaux
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	$autorisations=$resultats->fetchall();
	echo '<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
	echo '<thead>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>alach</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user</th><th>type</th>';
		echo '</tr>';
	echo '</thead>';
	print '<tbody>';
	foreach($autorisations as $autorisation):
	echo '<tr>';
		print '<td>'.$autorisation->autorisation_id.'</td>';
		print '<td>'.$autorisation->date_demande.'</td>';
		print '<td>'.$autorisation->alach.'</td>';
		print '<td>'.$autorisation->date_debut.'</td>';
		print '<td>'.$autorisation->date_fin.'</td>';
		print '<td>'.$autorisation->description.'</td>';
		print '<td>'.$autorisation->etat.'</td>';
		print '<td>'.$autorisation->nom.'</td>';
		print '<td>'.$autorisation->intitule.'</td>';
	
	echo '</tr>';
	endforeach;	
	print '</tbody>';
	echo '<tfoot>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>alach</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user</th><th>type</th>';
		echo '</tr>';
	echo '</tfoot>';
	echo '</table>';
	}
		else echo 'Table vide !!!' ;
	}





public function RetreiveHistory(){
	$sql="select *,autorisations.id as autorisation_id from autorisations INNER JOIN users ON autorisations.user_id = users.id
	INNER JOIN types ON autorisations.type_id = types.id where etat='Rejetée' or etat='Approuvée' or etat='en attente' ";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$autorisations=$resultats->fetchall();
echo '<table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '<thead>';
	echo '<tr>';
	echo '<th>ID</th><th>date demande</th><th>alach</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user</th><th>type</th>';
	echo '</tr>';
echo '</thead>';
print '<tbody>';
foreach($autorisations as $autorisation):
echo '<tr>';
	print '<td>'.$autorisation->autorisation_id.'</td>';
	print '<td>'.$autorisation->date_demande.'</td>';
	print '<td>'.$autorisation->alach.'</td>';
	print '<td>'.$autorisation->date_debut.'</td>';
	print '<td>'.$autorisation->date_fin.'</td>';
	print '<td>'.$autorisation->description.'</td>';
	print '<td>'.$autorisation->etat.'</td>';
	print '<td>'.$autorisation->nom.'</td>';
	print '<td>'.$autorisation->intitule.'</td>';

echo '</tr>';
endforeach;	
print '</tbody>';
echo '<tfoot>';
	echo '<tr>';
	echo '<th>ID</th><th>date demande</th><th>alach</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th><th>user_id</th><th>type_id</th>';
	echo '</tr>';
echo '</tfoot>';
echo '</table>';
}
	else echo 'Table vide !!!' ;
}



public function modification(){
    $sql = "UPDATE autorisations SET etat = '$this->etat' , alach='$this->alach' WHERE id = $this->id";
    $resultat = $this->cnx->exec($sql);
    if($resultat) {
        return true;
    } else {
        return false;
    }
}



public function counting(){
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'en attente'";
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<span class="badge badge-danger badge-counter">' . $count . '</span>';
    } else {
        echo '<span class="badge badge-danger badge-counter">0</span>';
    }
}
public function approuve(){
	
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'Approuvée' ";
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<strong class="number">' . $count . '</strong>';
    } else {
        echo '<strong class="number">0</strong>';
    }
}


public function rejetee(){
	
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'Rejetée' ";
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<strong class="number">' . $count . '</strong>';
    } else {
        echo '<strong class="number">0</strong>';
    }
}


public function tout(){
	
    $sql = "SELECT COUNT(*) as count FROM autorisations  ";
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<strong class="number">' . $count . '</strong>';
    } else {
        echo '<strong class="number">0</strong>';
    }
}


public function en_attente(){
	
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'en attente' ";
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<strong class="number">' . $count . '</strong>';
    } else {
        echo '<strong class="number">0</strong>';
    }
}
}



?>