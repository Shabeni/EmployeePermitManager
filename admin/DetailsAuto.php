<?php 
if(isset($_GET['id'])):
include_once('CLASSE/user.class.php');
include_once('CLASSE/autorisation.class.php');
include_once('CLASSE/type.class.php');
$p=new Autorisation('localhost','root','','rh');
$p->id=$_GET['id'];
$autorisationToUpdate=$p->RetreiveById();
$u = new User('localhost', 'root', '', 'rh');
$u->id = $autorisationToUpdate->user_id;
$userInfo = $u->RetreiveById();
$t = new Type('localhost', 'root', '', 'rh');
$t->id = $autorisationToUpdate->type_id;
$typeInfo = $t->RetreiveById();




?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<form action="" method="post" class="form">
    <input type="hidden" name="id" value="<?= $autorisationToUpdate->id; ?>" />

    <div class="form-group d-flex">
        <div class="flex-fill mr-3">
            <label for="">Nom:</label>
            <input type="text" name="nom" class="form-control" value="<?= $userInfo->nom; ?>" readonly/>
        </div>

        <div class="flex-fill">
            <label for="">Email:</label>
            <input type="text" name="email" class="form-control" value="<?= $userInfo->email; ?>" readonly />
        </div>
    </div>

    <div class="form-group d-flex">
        <div class="flex-fill mr-3">
            <label for="">Matricule:</label>
            <input type="text" name="matricule" class="form-control" value="<?= $userInfo->matricule; ?>" readonly/>
        </div>

        <div class="flex-fill">
            <label for="">Role:</label>
            <input type="text" name="Role" class="form-control" value="<?= $userInfo->role; ?>" readonly/>
        </div>
    </div>

    <div class="form-group d-flex">
        <div class="flex-fill mr-3">
            <label for="">Département:</label>
            <input type="text" name="departement" class="form-control" value="<?= $userInfo->departement_id; ?>" readonly />
        </div>
    
        <div class="flex-fill">
            <label for="">Types:</label>
            <input type="text" name="type" class="form-control" value="<?= $typeInfo->intitule; ?>" readonly />
        </div>
    
    </div>

    <div class="form-group d-flex">
        <div class="flex-fill mr-3">
            <label for="">État:</label>
            <select name="etat" class="form-control">
                <option value="en attente">En attente</option>
                <option value="Rejetée">Rejetée</option>
                <option value="Approuvée">Approuvée</option>
            </select>
        </div>

        <div class="flex-fill">
            <label for="">Alach:</label>
            <input type="text" name="alach" class="form-control" value="<?= $autorisationToUpdate->alach; ?>" />
        </div>
    </div>

    <div class="mt-3">
        <input type="submit" value="MODIFIER" name="btn_maj" class="btn btn-primary" onClick='return confirm("Voulez-vous vraiment enregistrer les modifications ?")' />
    </div>
</form>





	
</body>
</html>
<?php
endif; 
if(isset($_POST['btn_maj'])):
include_once('CLASSE/autorisation.class.php');
$p=new Autorisation('localhost','root','','rh');
$p->id=$_POST['id'];
$p->etat=$_POST['etat'];
$p->alach=$_POST['alach'];

//$p->adresse=$_POST['adresse'];

/*print '<pre>';
var_dump($p);
print '</pre>';*/
if($p->modification()) echo "<script>window.location.href = 'listeAutorisation.php?msg=1';
</script>";
else echo 'Erreur  !!!';

endif;