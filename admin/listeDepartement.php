
<?php 
include_once('includes/header.php');
include_once('includes/sidebar.php');
?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php 
				include_once('includes/topbar.php');
				?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tables</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
                        </div>
                        <div class="card-body">
                        <?php
  if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 1) {
    
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Suppression avec succès!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } elseif ($_GET['msg'] == 2) {
    
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Modification avec succès!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  }
  
  
  ?>      
                        <div class="table-responsive">
                           <?php
                      
                            include_once('classe/departement.class.php');
                            $p=new Departement('localhost','root','','rh');
                            $p->RetreiveWithDataTables();
                            
                           ?>
                           
                            </div>
                        </div>
                    </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php 
			include_once('includes/footer.php');
			?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php 
include_once('classe/modal.php');
?>

<!-- Scripts -->
<?php 
include_once('includes/scripts.php');
?>
</body>
</html>