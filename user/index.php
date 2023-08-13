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

    <title>Historique</title>
  </head>
  <body>
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
        <?php
        include_once('classe/autorisation.class.php');
        $p = new Autorisation('localhost', 'root', '', 'rh');
        $p->RetreiveWithDataTables();
        ?>



           

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