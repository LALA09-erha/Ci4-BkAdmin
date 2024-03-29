<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?> </title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-affiliatetheme"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BK ADMIN <sup>+</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($page == 'index') ? 'active' : '';  ?>">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?php echo ($page == 'siswa') ? 'active' : '';  ?>">
                <a class="nav-link" href="/siswa">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Data Siswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item <?php echo ($page == 'tambahlog') ? 'active' : '';  ?>">
                <a class="nav-link" href="/tambahlog">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Tambah Log Siswa</span></a>
            </li>

            <hr class="sidebar-divider">



            <!-- Nav Item - Tables -->
            <li class="nav-item <?php echo ($page == 'logperilaku') ? 'active' : '';  ?>">
                <a class="nav-link" href="/logperilaku">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Log Perilaku</span></a>
            </li>


            <?php
            if (session('role') == 'Admin') {
                echo '<hr class="sidebar-divider">';
                if ($page == 'users') {
                    echo '<li class="nav-item active">';
                } else {
                    echo '<li class="nav-item">';
                }
                echo '<a class="nav-link" href="/users">';
                echo '<i class="fas fa-fw fa-user"></i>';
                echo '<span>Users Data</span></a>';
                echo '</li>';
            }
            ?>

            <?php
            if (session('role') == 'Admin') {
                echo '<hr class="sidebar-divider">';
                if ($page == 'pelanggaran') {
                    echo '<li class="nav-item active">';
                } else {
                    echo '<li class="nav-item">';
                }
                echo '<a class="nav-link" href="/pelanggaran">';
                echo '<i class="fas fa-fw fa-bookmark"></i>';
                echo '<span>Jenis Pelanggaran</span></a>';
                echo '</li>';
            }
            ?>

            <?php
            if (session('role') == 'Admin') {
                echo '<hr class="sidebar-divider">';
                if ($page == 'kebaikan') {
                    echo '<li class="nav-item active">';
                } else {
                    echo '<li class="nav-item">';
                }
                echo '<a class="nav-link" href="/kebaikan">';
                echo '<i class="fas fa-fw fa-receipt"></i>';
                echo '<span>Jenis Kebaikan</span></a>';
                echo '</li>';
            }
            ?>

         

            <?php
            if (!empty($_SESSION['message'])) {
                echo '<hr class="sidebar-divider">';
                echo '<li class="nav-item">';
                echo '<div class="alert alert-warning text-center" role="alert">' . $_SESSION['message'] . '</div>';
                echo '</li>';
                unset($_SESSION['message']);
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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
                            <i class="fa fa-bars"></i>
                        </button>

                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    echo $_SESSION['username'];
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                         
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?= $this->renderSection('content') ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BK Admin 2024</span>
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
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="/logout" method="post">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="js/log.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>