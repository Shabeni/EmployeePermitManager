<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <script src="js/demo/datatables-demo.js"></script>
    <script src="vendor/databtables/jquery.dataTables.js" crossorigin="anonymous"></script>
    <script src="vendor/databtables/dataTables.bootstrap4.js" crossorigin="anonymous"></script>
    <script src="js/demo/datatables-demo.js"></script>

  </head>
  <body>
    <h1>DATABASE Departement </h1>
<?php 
if(isset($_GET['msg'])&& $_GET['msg']==1):
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Ok !</strong> Suppression avec succès
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
endif;
include_once('classe/type.class.php');
$p=new Type('localhost','root','','rh');
$p->RetreiveWithDataTables();
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
   

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
	

