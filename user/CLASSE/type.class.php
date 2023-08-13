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



public function RetreiveType() {
    $sql = "SELECT id,intitule FROM types where active='1'";
    $resultats = $this->cnx->query($sql);

    if ($resultats) {
        $types = $resultats->fetchAll(PDO::FETCH_OBJ);
echo '<select class="custom-select mr-sm-1"  name="type_id">';
        
foreach ($types as $type) :
            echo '<option value="' . $type->id . '">' . $type->intitule . '</option>';
		endforeach;	
		echo '</select>';
        
    }
}










}


?>