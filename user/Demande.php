<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Demande</title>
  </head>






<?php
include_once('includes/sidebar.php');
  


  ?>

<main>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
          <div class="col-md-12">
          <div class="card">
            <div class="card-body">


            <form class="user" action="traitement_demande.php" method="post">
  
            <div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <?php
  if (isset($_GET['msg']) && $_GET['msg'] == 1) {
    
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Demande envoyée!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
  ?>
        <label for="date_demande">date_demande</label>
        <input type="datetime-local" class="form-control" id="date_demande" name="date_demande" value="<?= date('Y-m-d\TH:i:s'); ?>"readonly>
      </div>
    </div>
  </div>
            <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="date_debut">Date_debut</label>
        <input type="datetime-local" class="form-control" name="date_debut" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="date_fin">Date_fin</label>
        <input type="datetime-local" class="form-control"  name="date_fin" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="column3" name="description" rows="4" required></textarea>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="description">Type</label>
    <?php
    include_once('classe/type.class.php');
     $p = new Type('localhost', 'root', '', 'rh');
    $p->RetreiveType();
    ?>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"name="btn_ajouter" onClick='return confirm("Voulez-vous vraiment envoyer cette demande ?")'>Submit</button>

</form>




</div>                
              
</div>          

</div>
          </div>
        </div>
      </div>  
    </main>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <?php
    include_once('includes/scripts.php');
    
    ?>
  </body>
</html>