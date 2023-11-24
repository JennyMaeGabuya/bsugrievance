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

    <title>ADMIN | Complaint Details</title>
    
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
          <h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
          <hr />


          <?php
                $query = mysqli_query($bd, "SELECT tablecomplaints.*, 
                category.categoryName AS catname, 
                category.categoryDescription 
         FROM tablecomplaints 
         JOIN category ON category.category_id = tablecomplaints.category_id 
         WHERE `sr-code` = '" . $_SESSION['id'] . "' 
               AND complaintNumber = '" . $_GET['cid'] . "'");
while ($row = mysqli_fetch_array($query)) { ?>
    <div class="row mt">
        <label class="col-sm-2 col-sm-2 control-label"><b>Complainant Name: </b></label>
        <div class="col-sm-4">
            <p><?php echo htmlentities($row['fullname']); ?></p>
        </div>
        <label class="col-sm-2 col-sm-2 control-label"><b>Sr-code:</b></label>
        <div class="col-sm-4">
            <p><?php echo htmlentities($row['`sr-code`']); ?></p>
        </div>
    </div>

    <div class="row mt">
        <label class="col-sm-2 col-sm-2 control-label"><b>Email: </b></label>
        <div class="col-sm-4">
            <p><?php echo htmlentities($row['email']); ?></p>
        </div>
        <label class="col-sm-2 col-sm-2 control-label"><b>Category:</b></label>
        <div class="col-sm-4">
            <p><?php echo htmlentities($row['categoryName']); ?></p>
        </div>
    </div>

    <div class="row mt">
        <label class="col-sm-2 col-sm-2 control-label"><b>Complaint for: </b></label>
        <div class="col-sm-4">
            <!-- Make sure 'complaintName' is part of the result set -->
            <p><?php echo htmlentities($row['complaintName']); ?></p>
        </div>
        <label class="col-sm-2 col-sm-2 control-label"><b>Category:</b></label>
        <div class="col-sm-4">
            <!-- Make sure 'categoryName' is part of the result set -->
            <p><?php echo htmlentities($row['categoryName']); ?></p>
        </div>
    </div>

    <div class="row mt">
        <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details: </b></label>
        <div class="col-sm-4">
            <p><?php echo htmlentities($row['complaintDetails']); ?></p>
        </div>
        <!-- Missing closing </div> tag -->

        <label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
        <div class="col-sm-4">
            <p><?php
                $cfile = $row['complaintFile'];
                if ($cfile == "" || $cfile == "NULL") {
                    echo htmlentities("File NA");
                } else { ?>
                    <a href="complaintdocs/<?php echo htmlentities($row['complaintFile']); ?>"> View File</a>
                <?php } ?>
            </p>
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
    $(function () {
        $('select.styled').customSelect();
    });
</script>
  </body>

  </html>
<?php } ?>