<?php
    require_once('template_header.php'); 
?>
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gray-700 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-snowflake-o" aria-hidden="true"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Neige et Soleil</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=1&menu=0">
        <i class="fa fa-bookmark" aria-hidden="true" ></i>
            <span>Accueil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
            Reservations et Locations
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRes"
            aria-expanded="true" aria-controls="collapseRes">
            <i class="fas fa-fw fa-cog" aria-hidden="true" ></i>
            <span>Reservations</span>
        </a>
        <div id="collapseRes" class="collapse" aria-labelledby="headingRes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reserver</h6>
                <a class="collapse-item" href="index.php?page=1&menu=0">Reserver</a>
                <a class="collapse-item" href="index.php?page=1&menu=0">Mes Reservations</a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
            Les locations
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoc"
            aria-expanded="true" aria-controls="collapseLoc">
            <i class="fas fa-fw fa-cog" aria-hidden="true" ></i>
            <span>Gerer vos locations</span>
        </a>
        <div id="collapseLoc" class="collapse" aria-labelledby="headingLoc" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Locations</h6>
                <a class="collapse-item" href="index.php?page=1&menu=0">Mes contrats</a>
                <a class="collapse-item" href="index.php?page=1&menu=0">Un soucis ?</a>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
            Espace Proprietaire
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProp"
            aria-expanded="true" aria-controls="collapseProp">
            <i class="fas fa-fw fa-cog" aria-hidden="true"></i>
            <span>Gerer</span>
        </a>
        <div id="collapseProp" class="collapse" aria-labelledby="headingProp" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mes contrats</h6>
                <a class="collapse-item" href="index.php?page=1&menu=0">Contrats</a>
                <a class="collapse-item" href="index.php?page=1&menu=0">Nouveau</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <!-- Topbar Search -->
            <!--
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            -->
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw" aria-hidden="true" ></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm" aria-hidden="true" ></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']."  "?></span>
                        <img class="img-profile rounded-circle" src="public/img/undraw_profile.svg" alt="">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true" ></i>
                            Compte
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true" ></i>
                            Se deconnecter
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                        require_once('gestionBackOffice.php');
                    ?>

                </div>
                <!-- /.container-fluid -->

        <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up" aria-hidden="true" ></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Etes vous sur ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Cliquez sur deconnexion si vous souhaitez deconnecter</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="index.php?page=6">Deconnexion</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
    require_once('template_footer.php'); 
?>