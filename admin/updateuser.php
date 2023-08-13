
<?php 

if(isset($_GET['id'])):
include_once('CLASSE/user.class.php');
$p=new User('localhost','root','','rh');
$p->id=$_GET['id'];
$employeeToUpdate=$p->RetreiveById();





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
    <input type="hidden" name="id" value="<?= $employeeToUpdate->id; ?>" />
    
    <div class="form-group">
        <label for="">Nom:</label>
        <input type="text" name="nom" class="form-control" value="<?= $employeeToUpdate->nom; ?>"  />
    </div>
    
    <div class="form-group">
        <label for="">Email:</label>
        <input type="text" name="email" class="form-control" value="<?= $employeeToUpdate->email; ?>" />
    </div>
    
    <div class="form-group">
        <label for="">role:</label>
        <input type="text" name="role" class="form-control" value="<?= $employeeToUpdate->role; ?>" />
    </div>
    

    <div class="form-group">
        <label for="">Matricule:</label>
        <input type="text" name="matricule" class="form-control" value="<?= $employeeToUpdate->matricule; ?>" />
    </div>
    
    <div class="form-group">
        <label for="">Actif:</label>
        <input type="text" name="actif" class="form-control" value="<?= $employeeToUpdate->actif; ?>" />
    </div>
    
    <div class="form-group">
        <label for="">Département:</label>
        

        <?php
        include_once('CLASSE/departement.class.php');
        $department = new Departement('localhost', 'root', '', 'rh');
        
        $departements = $department->RetreiveinUser();
        echo '<select name="departement_id" class="form-control">';
        foreach ($departements as $departement) :
            $selected = ($departement->id == $employeeToUpdate->departement_id) ? 'selected' : '';
            echo '<option value="' . $departement->id . '" ' . $selected . '>' . $departement->nom . '</option>';
        endforeach;	
        echo '</select>';
        
        ?>
         
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
include_once('CLASSE/user.class.php');
$p=new User('localhost','root','','rh');
$p->id=$_POST['id'];
$p->nom=$_POST['nom'];
$p->email=$_POST['email'];
$p->role=$_POST['role'];

$p->matricule=$_POST['matricule'];

$p->actif=$_POST['actif'];
$p->departement_id=$_POST['departement_id'];
//$p->adresse=$_POST['adresse'];


if($p->Update()) echo "<script>window.location.href = 'listeEmploye.php?msg=2';
</script>";
else echo 'Erreur  !!!';

endif;