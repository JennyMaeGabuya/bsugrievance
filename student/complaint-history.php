<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>STUDENT | Grievance History</title>

    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
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

    <style>
      /* Style for the overlay */
      .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        /* Semi-transparent white */
        z-index: 1000;
        justify-content: center;
        align-items: center;
      }

      /* Style for the loading spinner */
      .spinner {
        border: 6px solid #f3f3f3;
        /* Light grey */
        border-top: 6px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }
    </style>

    <!-- Overlay and loading spinner -->
    <div class="overlay" id="loadingOverlay">
      <div class="spinner"></div>
    </div>
  </head>

  <body>

    <section id="container">
      <?php include("includes/header.php"); ?>
      <?php include("includes/sidebar.php"); ?>

      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> My Grievance History</h3>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr style="text-align: center;">

                        <th>Complaint Number</th>
                        <th>Complaint Name</th>
                        <th>Filed Date</th>
                        <th>Last Updation Date</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $statusProcess = "In Process";
                      $statusClosed = "Closed";
                      $query = mysqli_query($bd, "SELECT * FROM tablecomplaints WHERE `sr-code` = '" . $_SESSION['id'] . "' ORDER BY complaintNumber DESC");

                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td align="center"><?php echo htmlentities($row['complaintNumber']); ?></td>
                          <td align="center"><?php echo htmlentities($row['complaintName']); ?></td>
                          <td align="center"><?php echo htmlentities($row['regDate']); ?></td>
                          <td align="center"><?php echo htmlentities($row['lastUpdationDate']);

                                              ?></td>
                          <td align="center"><?php
                                              $status = $row['status'];
                                              if ($status == "" or $status == "NULL") { ?>
                              <button type="button" class="btn btn-theme04">
                                <i class="fa fa-hourglass-start" style="font-size:16px;color:black;"></i> Not Process Yet
                              </button>

                            <?php }
                                              if ($status == $statusProcess) { ?>
                              <button type="button" class="btn btn-warning">
                                <i class="fa fa-spinner fa-spin" style="font-size:16px;"></i> In Process
                              </button>

                            <?php }
                                              if ($status == $statusClosed) {
                            ?>
                              <button type="button" class="btn btn-success">
                                <i class="fa fa-gavel" style="font-size:16px;color:white;"></i> Closed
                              </button>
                            <?php } ?>

                          <td align="center">
                            <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']); ?>">

                              <script>
                                function viewDetails() {
                                  // Show the loading overlay
                                  document.getElementById('loadingOverlay').style.display = 'flex';

                                  // Simulate a delay (replace this with your actual logic)
                                  setTimeout(function() {
                                    // Hide the loading overlay
                                    document.getElementById('loadingOverlay').style.display = 'none';

                                    if (confirmResult) {
                                      window.location.href = "complaint-details.php";
                                    }
                                  }, 3000); // 3 seconds delay
                                }
                              </script>

                              <button onclick="viewDetails()" class="btn btn-primary">View Details</button>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </section>
              </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->
          </div><!-- /row -->

        </section>
        <! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <?php include("includes/footer.php"); ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
      <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
      <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
      <script src="scripts/datatables/jquery.dataTables.js"></script>
      <script>
        $(document).ready(function() {
          $('.datatable-1').dataTable();
          $('.dataTables_paginate').addClass("btn-group datatable-pagination");
          $('.dataTables_paginate > a').wrapInner('<span />');
          $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
          $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        });
      </script>

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