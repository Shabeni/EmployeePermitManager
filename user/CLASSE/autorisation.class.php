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


public function Create(){
	//Préparer puis exécuter la requête
	//users(id,nom,email,role,matricule,actif,departement_id)
PRINT $sql="INSERT into autorisations values(NULL,'$this->date_demande','$this->alach','$this->date_debut','$this->date_fin','$this->description','$this->etat','$this->user_id','$this->type_id')";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
	
}




public function RetreiveWithDataTables(){
	$sql = "SELECT * FROM autorisations WHERE  user_id = " . $_SESSION['id'];

	$resultats=$this->cnx->query($sql);
	if($resultats) {// s'il y a des données à afficher
	//la variable $resultats est de type resultSet
	//Convertir $resultats en Tableaux
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	$autorisations=$resultats->fetchall();
	echo '<table id="myTable" class="table table-bordered table-striped">	';
	echo '<thead>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>alach</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th>';
		echo '</tr>';
	echo '</thead>';
	print '<tbody>';
	foreach($autorisations as $autorisation):
	echo '<tr>';
		print '<td>'.$autorisation->id.'</td>';
		print '<td>'.$autorisation->date_demande.'</td>';
		print '<td>'.$autorisation->alach.'</td>';
		print '<td>'.$autorisation->date_debut.'</td>';
		print '<td>'.$autorisation->date_fin.'</td>';
		print '<td>'.$autorisation->description.'</td>';
		print '<td>'.$autorisation->etat.'</td>';
	
	echo '</tr>';
	endforeach;	
	print '</tbody>';
	echo '<tfoot>';
		echo '<tr>';
		echo '<th>ID</th><th>date demande</th><th>alach</th><th>date debut</th><th>date fin</th><th>description</th><th>etat</th>';
		echo '</tr>';
	echo '</tfoot>';
	echo '</table>';
	}
		else echo 'Table vide !!!' ;
	}

	
	
	











public function counting(){
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'en attente' and user_id = " . $_SESSION['id'];
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<strong class="number">' . $count . '</strong>';
    } else {
        echo '<strong class="number">0</strong>';
    }
}



public function approuve(){
	
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'Approuvée' AND user_id = " . $_SESSION['id'];
    $resultat = $this->cnx->query($sql);
    $count = $resultat->fetch(PDO::FETCH_ASSOC)['count'];
    if ($count > 0) {
        echo '<strong class="number">' . $count . '</strong>';
    } else {
        echo '<strong class="number">0</strong>';
    }
}

public function rejetee(){
    $sql = "SELECT COUNT(*) as count FROM autorisations WHERE etat = 'Rejetée' AND user_id = " . $_SESSION['id'];
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