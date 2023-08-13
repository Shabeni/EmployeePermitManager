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
                        <h1 class="h3 mb-0 text-gray-800">Ajout Département</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create Department!</h1>
                            </div>
                            <form class="user" action="traitementdepart.php" method="post">
                            <div class="row mb-3">
                             <div class="col">
                            <input type="text" name="nom" class="form-control form-control-lg" placeholder="Departement">
                            </div>
                            </div>

                             <div class="row">
                                <div class="col">
                            <input type="submit" value="Ajouter" class="btn btn-primary btn-user btn-block" name="btn_ajouter">
                            </div>
                            </div>

                            <hr>
                            </form>

                            <hr>
                            
                        </div>
                    </div>
                </div>

                    <!-- Content Row -->

                    
                    <!-- Content Row -->
                    
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