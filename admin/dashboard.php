<?php session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ADMIN | Dashboard</title>

    <style>
      .nav-collapse {
        background: rgb(199, 123, 128);
      }

      .sidebar-menu li:hover {
        background-color: white;
      }

      .box1 {
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
      }

      .box1:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      }

      .animated-icon {
        font-size: 48px;
        color: #333;
        transition: transform 0.3s ease-in-out;
      }

      .animated-icon:hover {
        transform: scale(1.2);
      }

      .bigger-icon {
        font-size: 60px;
      }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- external css -->
    <link href="assets/font-awesome/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>

  <body>

    <section id="container">
      <?php include("includes/header.php"); ?>
      <?php include("includes/sidebar.php"); ?>

      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-9 main-chart">

              <div class="col-md-5 col-sm-2 text-center">
                <canvas></canvas>
              </div><br><br>

<<<<<<< HEAD
              <div class="col-md-2 col-sm-2 text-center">
                <a href="complaintsrecord.php" style="color: gray; text-decoration: none;">
                  <span class="fa fa-file animated-icon bigger-icon" style="color: #666666;"></span>
                  <?php
                  $query = mysqli_query($bd, "SELECT COUNT(*) AS total_complaints FROM tablecomplaints");
                  $result = mysqli_fetch_assoc($query);
                  $totalComplaints = $result['total_complaints'];
                  ?>
                  <hr>
                  <h3><b><?php echo htmlentities($totalComplaints); ?></b></h3>
                  <h4>Grievance Records</h4>
                </a>
              </div>

              <div class="col-md-2 col-sm-2 text-center">
                <a href="ongoingcomplaint.php" style="color: gray; text-decoration: none;">
                  <span class="fa fa-cog animated-icon bigger-icon" style="color: #8B0000;"></span>
                  <?php
                  $status = "In Process";
                  $rt = mysqli_query($bd, "SELECT * FROM tablecomplaints where  `status`='$status'");
                  $num1 = mysqli_num_rows($rt);
                  ?>
                  <hr>
                  <h3><b><?php echo htmlentities($num1); ?></b></h3>
                  <h4>In Process Complaints</h4>
                </a>
              </div>

              <div class="col-md-2 col-sm-2 text-center">
                <a href="closedcomplaint.php" style="color: gray; text-decoration: none;">
                  <span class="fa fa-check-circle animated-icon bigger-icon" style="color: #006400;"></span>
                  <?php
                  $status = "Closed";
                  $rt = mysqli_query($bd, "SELECT * FROM tablecomplaints where `status`='$status'");
                  $num1 = mysqli_num_rows($rt);
                  ?>
                  <hr>
                  <h3><b><?php echo htmlentities($num1); ?></b></h3>
                  <h4>Closed Complaints</h4>
=======
                </div>
              </div>

              <div class="col-md-2 col-sm-2" style="text-align: center; color: black">
                <div class="box1">
                  <a href="complaintsrecord.php" style="color: black">
                    <span class="li_news"></span>
                    <?php
                    $query = mysqli_query($bd, "SELECT COUNT(*) AS total_complaints FROM `tablecomplaints`");
                    $result = mysqli_fetch_assoc($query);
                    $totalComplaints = $result['total_complaints'];
                    ?><?php session_start();
                    error_reporting(0);
                    include('includes/config.php');
                    if (strlen($_SESSION['login']) == 0) {
                      header('location:index.php');
                    } else { ?>
                    
                      <!DOCTYPE html>
                      <html lang="en">
                    
                      <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta name="description" content="">
                        <meta name="author" content="Dashboard">
                        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
                    
                        <title>ADMIN | Dashboard</title>
                    
                        <style>
                          .nav-collapse {
                            background: rgb(199, 123, 128);
                          }
                    
                          .sidebar-menu li:hover {
                            background-color: white;
                          }
                    
                          .box1 {
                            padding: 20px;
                            border-radius: 10px;
                            background-color: #fff;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            transition: box-shadow 0.3s ease-in-out;
                          }
                    
                          .box1:hover {
                            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                          }
                    
                          .animated-icon {
                            font-size: 48px;
                            color: #333;
                            transition: transform 0.3s ease-in-out;
                          }
                    
                          .animated-icon:hover {
                            transform: scale(1.2);
                          }
                    
                          .bigger-icon {
                            font-size: 60px;
                          }
                        </style>
                    
                        <!-- Bootstrap core CSS -->
                        <link href="assets/css/bootstrap.css" rel="stylesheet">
                        <!-- external css -->
                        <link href="assets/font-awesome/css/all.css" rel="stylesheet" />
                        <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
                        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
                        <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
                    
                        <!-- Custom styles for this template -->
                        <link href="assets/css/style.css" rel="stylesheet">
                        <link href="assets/css/style-responsive.css" rel="stylesheet">
                    
                        <script src="assets/js/chart-master/Chart.js"></script>
                    
                        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                        <!--[if lt IE 9]>
                        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                      <![endif]-->
                      </head>
                    
                      <body>
                    
                        <section id="container">
                          <?php include("includes/header.php"); ?>
                          <?php include("includes/sidebar.php"); ?>
                    
                          <section id="main-content">
                            <section class="wrapper">
                              <div class="row">
                                <div class="col-lg-9 main-chart">
                    
                                  <div class="col-md-5 col-sm-2 text-center">
                                    <canvas></canvas>
                                  </div><br><br>
                    
                                  <div class="col-md-2 col-sm-2 text-center">
                                    <a href="complaintsrecord.php" style="color: gray; text-decoration: none;">
                                      <span class="fa fa-file animated-icon bigger-icon" style="color: #666666;"></span>
                                      <?php
                                      $query = mysqli_query($bd, "SELECT COUNT(*) AS total_complaints FROM tablecomplaints");
                                      $result = mysqli_fetch_assoc($query);
                                      $totalComplaints = $result['total_complaints'];
                                      ?>
                                      <hr>
                                      <h3><b><?php echo htmlentities($totalComplaints); ?></b></h3>
                                      <h4>Grievance Records</h4>
                                    </a>
                                  </div>
                    
                                  <div class="col-md-2 col-sm-2 text-center">
                                    <a href="ongoingcomplaint.php" style="color: gray; text-decoration: none;">
                                      <span class="fa fa-cog animated-icon bigger-icon" style="color: #8B0000;"></span>
                                      <?php
                                      $status = "In Process";
                                      $rt = mysqli_query($bd, "SELECT * FROM tablecomplaints where  `status`='$status'");
                                      $num1 = mysqli_num_rows($rt);
                                      ?>
                                      <hr>
                                      <h3><b><?php echo htmlentities($num1); ?></b></h3>
                                      <h4>In Process Complaints</h4>
                                    </a>
                                  </div>
                    
                                  <div class="col-md-2 col-sm-2 text-center">
                                    <a href="closedcomplaint.php" style="color: gray; text-decoration: none;">
                                      <span class="fa fa-check-circle animated-icon bigger-icon" style="color: #006400;"></span>
                                      <?php
                                      $status = "Closed";
                                      $rt = mysqli_query($bd, "SELECT * FROM tablecomplaints where `status`='$status'");
                                      $num1 = mysqli_num_rows($rt);
                                      ?>
                                      <hr>
                                      <h3><b><?php echo htmlentities($num1); ?></b></h3>
                                      <h4>Closed Complaints</h4>
                                    </a>
                                  </div>
                    
                                  <?php ?> <!-- } -->
                    
                                </div><!-- /row mt -->
                    
                            </section>
                          </section>
                          <?php include("includes/footer.php"); ?>
                        </section>
                    
                        <!-- js placed at the end of the document so the pages load faster -->
                        <script src="assets/js/jquery.js"></script>
                        <script src="assets/js/jquery-1.8.3.min.js"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
                        <script src="assets/js/jquery.scrollTo.min.js"></script>
                        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
                        <script src="assets/js/jquery.sparkline.js"></script>
                        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
                    
                    
                        <!--common script for all pages-->
                        <script src="assets/js/common-scripts.js"></script>
                    
                        <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
                        <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
                    
                        <!--script for this page-->
                        <script src="assets/js/sparkline-chart.js"></script>
                        <script src="assets/js/zabuto_calendar.js"></script>
                    
                      </body>
                    
                      </html>
                    <?php } ?>
                  </a>
                </div>
                <h3><b><?php echo htmlentities($totalComplaints); ?></b></h3>
                <h4>Grievance Records</h4>
              </div>

              <div class="col-md-2 col-sm-2" style="text-align: center; color: orange">
                <div class="box1">
                  <a href="ongoingcomplaint.php" style="color: gray">
                    <span class="li_settings"></span>
                    <?php
                    $status = "In Process";
                    $rt = mysqli_query($bd, "SELECT * FROM `tablecomplaints` where  `status`='$status'");
                    $num1 = mysqli_num_rows($rt);
                    ?>
                </div>
                <h3><b><?php echo htmlentities($num1); ?></h3>
                <h4></b>In Process Complaints</h4>
                </a>
              </div>

              <div class="col-md-2 col-sm-2" style="text-align: center; color: gray">
                <div class="box1">
                  <a href="closedcomplaint.php" style="color: gray">
                    <span class="li_news"></span>
                    <?php
                    $status = "Closed";
                    $rt = mysqli_query($bd, "SELECT * FROM `tablecomplaints` where   `status`='$status'");
                    $num1 = mysqli_num_rows($rt);
                    ?>
                </div>
                <h3><b><?php echo htmlentities($num1); ?></h3>
                <h4></b>Closed Complaints</h4>
>>>>>>> 86d5d2985a7a79e1b16a21062c63f5d94ddf645b
                </a>
              </div>

              <?php ?> <!-- } -->

            </div><!-- /row mt -->

        </section>
      </section>
      <?php include("includes/footer.php"); ?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
    <script src="assets/js/zabuto_calendar.js"></script>

  </body>

  </html>
<?php } ?>