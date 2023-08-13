
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                  <!-- Content Row -->
                  <div class="row"style="margin-bottom: 34%;" >

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Toutes les autorisations</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                    include_once('classe/autorisation.class.php');
                                    $p = new Autorisation('localhost', 'root', '', 'rh');
                                    $p->tout();
                                    ?>
                                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         Approuvée</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                    include_once('classe/autorisation.class.php');
                                    $p = new Autorisation('localhost', 'root', '', 'rh');
                                    $p->approuve();
                                    ?>
                                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         Rejetée</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                    include_once('classe/autorisation.class.php');
                                    $p = new Autorisation('localhost', 'root', '', 'rh');
                                    $p->rejetee();
                                    ?>
                                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         En attente</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                    include_once('classe/autorisation.class.php');
                                    $p = new Autorisation('localhost', 'root', '', 'rh');
                                    $p->en_attente();
                                    ?>
                                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
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