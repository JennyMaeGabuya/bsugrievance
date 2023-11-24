<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {

  if (isset($_GET['del'])) {
    $studentId = $_GET['studid'];
    mysqli_query($bd, "DELETE tbstudinfo, tbstudcontact FROM tbstudinfo INNER JOIN tbstudcontact ON tbstudinfo.studid = tbstudcontact.studid WHERE tbstudinfo.studid = '$studentId'");
    $_SESSION['delmsg'] = "Account deleted!!";
  }

?>
  <!DOCTYPE html>
  <html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ADMIN | Manage Users</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="...">

    <script language="javascript" type="text/javascript">
      var popUpWin = 0;

      function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
          if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
      }
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .form {
        display: inline;
        display: flex;
        justify-content: end;
      }

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
          <h3><i class="fa fa-angle-right"></i> Manage Student Accounts</h3>

          <!-- Success or error messages -->
          <?php if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?>
            </div>
            <?php unset($_SESSION['msg']); ?>

          <?php } elseif (isset($_SESSION['delmsg'])) { ?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?>
            </div>
            <?php unset($_SESSION['delmsg']); ?>
          <?php } ?>

          <!-- Search -->
          <div class="row">
            <div class="col-md-6 col-md-offset-9">
              <form method="GET" action="">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-search"></i></span>
                  <input type="text" class="form-control" style="width: 200px; color: black; font-weight: bold;" placeholder="Search by Name" name="search" id="search">
                  <span class="input-group-btn">
                  </span>
                </div>
              </form>
            </div>
          </div>

          <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>

                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email </th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th style="text-align: center;">Action</th>

                      </tr>
                    </thead>
                    <tbody id="usersTableBody"></tbody>

                    <!-- JavaScript for live search -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                      $(document).ready(function() {
                        $('#search').on('keyup', function() {
                          var searchText = $(this).val().toLowerCase();
                          $.ajax({
                            method: 'GET',
                            url: 'search_user.php', // Separate PHP file for handling search
                            data: {
                              search: searchText
                            },
                            success: function(response) {
                              $('#usersTableBody').html(response);
                            }
                          });
                        });
                      });
                    </script>

                    <?php
                    $query = mysqli_query($bd, "SELECT * 
                                                    FROM tbstudinfo 
                                                    JOIN tbstudcontact ON tbstudinfo.studid = tbstudcontact.studid");
                    $cnt = 1;

                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                      <tr style="text-align: center;">
                        <td><?php echo htmlentities($row['studid']); ?></td>
                        <td><?php echo htmlentities($row['firstname'] . ' ' . $row['lastname']); ?></td>
                        <td><?php echo htmlentities($row['email']); ?></td>
                        <td><?php echo htmlentities($row['address']); ?></td>
                        <td><?php echo htmlentities($row['contact_no']); ?></td>

                        <td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/bsugrievance/admin/studprofile.php?studid=<?php echo htmlentities($row['studid']); ?>');" title="View">
                            <button type="button" class="btn btn-primary" style="padding-left: 10px;">View Details</button>
                            <a href="manage user.php?studid=<?php echo $row['studid'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash fa-lg" style="margin-left: 5px; color: #ff0000"></i></a>
                          </a></td>
                      </tr>

                    <?php
                      $cnt = $cnt + 1;
                    }
                    ?>
                  </table>
              </div>
            </div>

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