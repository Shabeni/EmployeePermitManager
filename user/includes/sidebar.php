<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:../index.php'); // Redirect to the login page
    exit(); // Stop further execution of the script
}

?>
<!-- Topbar -->
<aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="images/person_profile.jpg" alt="Image" class="img-fluid">
          <h3 class="name"><?= $_SESSION['nom']; ?></span></h3>
          <span class="country">New York, USA</span>
        </div>

        <div class="counter d-flex justify-content-center">
          <!-- <div class="row justify-content-center"> -->
            <div class="col">
            <?php
    include_once('classe/autorisation.class.php');
     $p = new Autorisation('localhost', 'root', '', 'rh');
    $p->counting();
    ?>
              <span class="number-label">En_cours</span>
            </div>
            <div class="col">
            <?php
    include_once('classe/autorisation.class.php');
     $p = new Autorisation('localhost', 'root', '', 'rh');
    $p->approuve();
    ?>
              <span class="number-label">Approuvée</span>
            </div>
            <div class="col">
            <?php
              include_once('classe/autorisation.class.php');
              $p = new Autorisation('localhost', 'root', '', 'rh');
              $p->rejetee();
              ?>
              <span class="number-label">Rejetée</span>
            </div>
          <!-- </div> -->
        </div>
        
        <div class="nav-menu">
          <ul>
            <li class="active"><a href="index.php"><span class="icon-home mr-3"></span>Historique</a></li>
           
            <li><a href="Demande.php"><span class="icon-location-arrow mr-3"></span>Demande</a></li>
           
            
            <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
        </div>
      </div>
      
    </aside>
                <!-- End of Topbar -->