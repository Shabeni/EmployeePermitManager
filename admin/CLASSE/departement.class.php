<?php
//classe CRUD associée à la table SQL users(id,nom,email,role,matricule,actif,departement_id)
Class Departement{
//attributs
public $id,$nom,$actif;
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
 $sql="INSERT into departements values(NULL,'$this->nom','$this->actif')";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
	
}

public function RetreiveWithDataTables(){
	$sql="select * from departements";
$resultats=$this->cnx->query($sql);
if($resultats) {// s'il y a des données à afficher
//la variable $resultats est de type resultSet
//Convertir $resultats en Tableaux
$resultats->setFetchMode(PDO::FETCH_OBJ);
$departements=$resultats->fetchall();
echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '<thead>';
	echo '<tr>';
	echo '<th>ID</th><th>Nom</th><th>Actif</th><th>Cellule1</th><th>Cellule2</th>';
	echo '</tr>';
echo '</thead>';
echo '<tfoot>';
	echo '<tr>';
	echo '<th>ID</th><th>Nom</th><th>Actif</th><th>Cellule1</th><th>Cellule2</th>';
	echo '</tr>';
echo '</tfoot>';
print '<tbody>';
foreach($departements as $departement):
echo '<tr>';
	print '<td>'.$departement->id.'</td>';
	print '<td>'.$departement->nom.'</td>';
	print '<td>'.$departement->actif.'</td>';
	
	print '<td><a class="btn btn-danger btn-circle btn-sm" onClick="return confirm(\'Vous êtes sur ?\');" href="SuppressionDep.php?id='.$departement->id.'"><i class="fas fa-trash"></i></a></td>';
	print '<td><a  class="btn btn-success btn-square btn-sm"href="modifydepart.php?id='.$departement->id.'">
	<i class="fas fa-edit"></i></a></td>';
echo '</tr>';
endforeach;	
print '</tbody>';

echo '</table>';
}
	else echo 'Table vide !!!' ;
}

public function Delete(){
    $sql="delete from departements where id=$this->id";
    $resultat = $this->cnx->exec($sql);
    if($resultat) {
        return true;
    } else {
        return false;
    }
}


public function RetreiveById(){
	$sql="select * from departements where id=$this->id";
	$resultat=$this->cnx->query($sql);
	if($resultat) {
		$users=$resultat->fetch(PDO::FETCH_OBJ);
		return $users;
	}
	else return false;	
}

public function Update(){
	$sql="update departements set nom='$this->nom',actif='$this->actif' where id=$this->id";
$resultat=$this->cnx->exec($sql);
if($resultat) return true;
	else return false;
}

public function RetreiveWith() {
    $sql = "SELECT id,nom FROM departements";
    $resultats = $this->cnx->query($sql);

    if ($resultats) {
        $departements = $resultats->fetchAll(PDO::FETCH_OBJ);
echo '<select class="custom-select mr-sm-1"  name="departement_id">';
        
foreach ($departements as $departement) :
            echo '<option value="' . $departement->id . '">' . $departement->nom . '</option>';
		endforeach;	
		echo '</select>';
        
    }
}

public function RetreiveinUser() {
    $sql = "SELECT * FROM departements";
    $resultats = $this->cnx->query($sql);

    if ($resultats) {

		$departements = $resultats->fetchAll(PDO::FETCH_OBJ);
		return $departements;
	}

}
}


?>