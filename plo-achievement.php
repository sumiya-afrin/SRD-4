<?php
    require 'php/middleware.php';
    require 'php/plo-achievement.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPMS | SRD4</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">SPMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <li class="nav-item active">
                <a class="nav-link" href="plo-achievement.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>PLO Achievement Views</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="progress-views.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Progress Views</span></a>
            </li>

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
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Higher Management</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Plo Achievement</h1>
                        
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Views</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Choose View:</div>
                                            <a class="dropdown-item" onclick="showView(1);">View#1</a>
                                            <a class="dropdown-item" onclick="showView(2);">View#2</a>
                                            <!-- <div class="dropdown-divider"></div> -->
                                            <a class="dropdown-item" onclick="showView(3);">View#3</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart" id="chart1">
                                        <canvas id="view1"></canvas>
                                    </div>
                                    <div class="chart" id="chart2">
                                        <canvas id="view2"></canvas>
                                    </div>
                                    <div class="chart" id="chart3">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Course</th>
                                                    <?php
                                                        for($i=1; $i<=$ploNum; $i++){
                                                            echo "<th>PLO".$i."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>Course</th>
                                                    <?php
                                                        for($i=1; $i<=$ploNum; $i++){
                                                            echo "<th>PLO".$i."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    foreach($pMarks as $c => $m){
                                                        echo "<tr>
                                                                <td>".$c."</td>";
                                                        for($i=1; $i<=$ploNum; $i++){
                                                            if(isset($m[$i])){
                                                                $r = $m[$i] * 100 / $pTotal[$c][$i];
                                                                if($r>=40){
                                                                    echo "<td style='color: green;'>";
                                                                }else{
                                                                    echo "<td style='color: red;'>";
                                                                }
                                                                echo round($r, 2)."</td>";
                                                            }else{
                                                                echo "<td>N/A</td>";
                                                            }
                                                        }
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <form class="user" action="" id="id-form">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-4 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="id"
                                            placeholder="Student ID" required>
                                    </div>
                                </div>
                                <div align="center">
                                    <buttn type="button" class="btn btn-primary btn-user">Submit</buttn>
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SPMS | SRD4 2021</span>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="php/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    
    <!-- Page level custom scripts -->
    <script src="js/plo-achievement.js"></script>

<script>

var ctx = document.getElementById('view1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [
            <?php
                for($i=1; $i<=$ploNum; $i++){
                    echo "'PLO".$i."', ";
                }
            ?>
        ],
        datasets: [{
            label: 'PLO Percentage',
            backgroundColor: '#375DCD',
            data: [
                <?php
                    for($i=1; $i<=$ploNum; $i++){
                        if(isset($pfMarks[$i])){
                            $c = $pfMarks[$i] * 100 / $pfTotal[$i];
                            echo round($c, 2).", ";
                        }else{
                            echo "0, ";
                        }
                    }
                    echo "100";
                ?>
            ]
        }]
    },

    // Configuration options go here
    options: {}
});

var ctx = document.getElementById('view2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [
            <?php
                for($i=1; $i<=$ploNum; $i++){
                    echo "'PLO".$i."', ";
                }
            ?>
        ],
        datasets: [
            <?php
                $i = 1;
                foreach($pMarks as $c => $m){
                    echo"{
                        label: '".$c."',
                        backgroundColor: '".$color[$i]."',
                        data: [";
                    for($i=1; $i<=$ploNum; $i++){
                        if(isset($m[$i])){
                            echo $m[$i].", ";
                        }else{
                            echo "0, ";
                        }
                    }      
                    echo"]
                    },"; 
                    $i++;
                }           
            ?>
        ]
    },

    // Configuration options go here
    options: {
        scales: {
			xAxes: [{
				stacked: true,
			}],
			yAxes: [{
				stacked: true
			}]
	    }
    }
});

</script>

</body>

</html>