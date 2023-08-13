<?php 
if(isset($_GET['id'])):
include_once('CLASSE/departement.class.php');
$p=new Departement('localhost','root','','rh');
$p->id=$_GET['id'];
$departementToUpdate=$p->RetreiveById();


endif;






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

    <input type="hidden" name="id" value="<?= $departementToUpdate->id;?>" />
    <div class="form-group">
        <label for="">Nom:</label>
        <input type="text" name="nom" class="form-control" value="<?= $departementToUpdate->nom;?>" />
    </div>
    <div class="form-group">
        <label for="">actif:</label>
        <input type="text" name="actif" class="form-control" value="<?= $departementToUpdate->actif;?>" />
    </div>
    
    
    <div class="mt-3"> 
    <input type="submit" value="MODIFIER" name="btn_maj" class="btn btn-primary" onClick='return confirm("Voulez-vous vraiment enregistrer les modifications ?")' />

    </div>
    
</form>


	
</body>
</html>


<?php 
if(isset($_POST['btn_maj'])):
include_once('CLASSE/departement.class.php');
$p=new Departement('localhost','root','','rh');
$p->id=$_POST['id'];
$p->nom=$_POST['nom'];
$p->actif=$_POST['actif'];

if($p->Update()) echo "<script>window.location.href = 'listeDepartement.php?msg=2'
</script>";
else echo 'Erreur  !!!';

endif;
?>