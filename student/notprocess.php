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

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <link href="assets/css/table-responsive.css" rel="stylesheet">

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
                    <h3><i class="fa fa-angle-right"></i> Not Process Yet Complaint</h3>
                    <div class="row mt">
                        <div class="col-lg-12">
                            <div class="content-panel">
                                <section id="unseen">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>

                                                <th>Complaint Number</th>
                                                <th>Complaint Name</th>
                                                <th>Filed Date</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = mysqli_query($bd, "SELECT tablecomplaints.*, CONCAT(tbstudinfo.firstname, ' ', tbstudinfo.lastname) AS fullname
                      FROM tablecomplaints
                      JOIN tbstudinfo ON tablecomplaints.`sr-code` = tbstudinfo.studid
                      WHERE tablecomplaints.status IS NULL;");

                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td align="center"><?php echo htmlentities($row['complaintNumber']); ?></td>
                                                    <td align="center"><?php echo htmlentities($row['complaintName']); ?></td>
                                                    <td align="center"><?php echo htmlentities($row['regDate']);

                                                                        ?></td>
                                                    <td align="center"><?php
                                                                        $status = $row['status'];
                                                                        if ($status == "" or $status == "NULL") { ?>
                                                            <button type="button" class="btn btn-theme04">Not Process Yet</button>

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
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->

    </body>

    </html>
<?php } ?>