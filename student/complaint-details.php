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

    <title>STUDENT | Grievance Details</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

    <section id="container">
      <?php include('includes/header.php'); ?>
      <?php include('includes/sidebar.php'); ?>
      <section id="main-content">
        <section class="wrapper site-min-height">
          <h3><i class="fa fa-angle-right"></i> My Grievance Details</h3>
          <hr />

          <?php
          $query = mysqli_query($bd, "SELECT tablecomplaints.*, category.categoryName AS catname, category.categoryDescription 
          FROM tablecomplaints 
          JOIN category ON category.category_id = tablecomplaints.category_id 
          WHERE `sr-code` = '" . $_SESSION['id'] . "' AND complaintNumber = '" . $_GET['cid'] . "'");
          ?>

          <?php while ($row = mysqli_fetch_array($query)) { ?>
            <div class="row mt">
              <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Number : </b></label>
              <div class="col-sm-4">
                <p><?php echo htmlentities($row['complaintNumber']); ?></p>
              </div>
              <label class="col-sm-2 col-sm-2 control-label"><b>Filed Date :</b></label>
              <div class="col-sm-4">
                <p><?php echo htmlentities($row['regDate']); ?></p>
              </div>
            </div>

            <div class="row mt">
              <label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
              <div class="col-sm-4">
                <p><?php echo htmlentities($row['catname']); ?></p>
              </div>

              <label class="col-sm-2 col-sm-2 control-label"><b>Description :</b></label>
              <div class="col-sm-4">
                <p><?php echo htmlentities($row['categoryDescription']); ?></p>
              </div>
            </div>

            <div class="row mt">
              <label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
              <div class="col-sm-4">
                <p><?php $cfile = $row['complaintFile'];
                    if ($cfile == "" || $cfile == "NULL") {
                      echo htmlentities("File NA");
                    } else { ?>
                    <a href="complaintdocs/<?php echo htmlentities($row['complaintFile']); ?>"> View File</a>
                  <?php } ?>

                </p>
              </div>

              <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type :</b> </label>
              <div class="col-sm-4">
                <p><?php echo htmlentities($row['complaintName']); ?></p>
              </div>

            </div>

            <div class="row mt">
              <label class="col-sm-2 col-sm-2 control-label"><b>Grievance Details :</label></b>
              <div class="col-sm-10">
                <p><?php echo htmlentities($row['complaintDetails']); ?></p>
              </div>

            </div>

            <?php
            $ret = mysqli_query($bd, "
                SELECT 
                    complaint_remark.remark as remark,
                    complaint_remark.status as sstatus,
                    complaint_remark.remarkDate as rdate 
                FROM 
                    complaint_remark 
                JOIN 
                    tablecomplaints ON tablecomplaints.complaintNumber = complaint_remark.complaintNumber 
                WHERE 
                    complaint_remark.complaintNumber = '" . $_GET['cid'] . "'
              ");
            while ($rw = mysqli_fetch_array($ret)) {
            ?>
              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Remark:</b></label>
                <div class="col-sm-10">
                  <?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp; <b>Remark Date: <?php echo  htmlentities($rw['rdate']); ?></b>
                </div>
              </div>
              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Status:</b></label>
                <div class="col-sm-10">
                  <?php echo  htmlentities($rw['sstatus']); ?>
                </div>
              </div>
            <?php } ?>

            <div class="row mt">
              <label class="col-sm-2 col-sm-2 control-label"><b>Final Status :</b></label>
              <div class="col-sm-4">
                <p style="color:red"><b><?php
                                        if ($row['status'] == "NULL" || $row['status'] == "") {
                                          echo "Not Process Yet";
                                        } else {
                                          echo htmlentities($row['status']);
                                        }
                                        ?></b></p>
              </div>
            </div>
          <?php } ?>
        </section>
        <!-- /wrapper -->
      </section><!-- /MAIN CONTENT -->
      <?php include('includes/footer.php'); ?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->

    <script>
      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });
    </script>


  </body>

  </html>
<?php } ?>