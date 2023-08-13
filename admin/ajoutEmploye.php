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
                        <h1 class="h3 mb-0 text-gray-800">Ajout Employé</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="traitement.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="nom" placeholder="Saisir le nom " required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="role" 
                                            placeholder="Role de l'employé" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" 
                                        placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="pwd" required >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="matricule" 
                                        placeholder="Matricule" required>
                                    </div>
                                    
                                
                                </div>
                                    <label  class="mr-sm-2" for="department_id">Department:</label>
                                    <div class="text-center">

                                    <div  >
                                    <?php
                                    include_once('classe/departement.class.php');
                                    $p = new Departement('localhost', 'root', '', 'rh');
                                    $p->RetreiveWith();
                                    ?>
                                </div>
                                </div>

                                <div class="mt-5 text-center">
								<input type="submit" value="Ajouter" class="btn btn-primary btn-user px-5 " name="btn_ajouter"/>
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