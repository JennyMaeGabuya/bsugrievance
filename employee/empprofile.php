<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit; // Ensure to exit after redirecting
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ensure a file is selected
  if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] == 0) {
      $targetDirectory = "profilepicture/";
      $profile = $_FILES["profile"]["name"];
      $targetFile = $targetDirectory . basename($profile);

      // Define the maximum file size in bytes (e.g., 5MB)
      $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

      // Check file type and size
      $fileSize = $_FILES["profile"]["size"];
      if ($fileSize > $maxFileSize) {
          echo "File size exceeds the maximum limit (5MB).";
      } else {
          // Move the uploaded file to the desired directory
          if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
              // Update the database with the file name or path
              $email = $_SESSION['login'];
              $query = mysqli_query($bd, "UPDATE tbempcontact SET `profile_picture` = '$profile' WHERE email='$email'");

              if ($query) {
                  $successMessage = "You have successfully updated your profile picture!";
              } else {
                  echo "Error updating profile picture: " . mysqli_error($bd);
              }
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
  } else {
      echo "Please select a file to upload.";
  }
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

  <title>EMPLOYEE | View Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

</head>

<body>

  <section id="container">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Profile Information</h3>

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">

              <?php
               $email = $_SESSION['login'];
              $query = mysqli_query($bd, "SELECT empinfo.*, empcontact.*
                FROM tbempinfo AS empinfo
                INNER JOIN tbempcontact AS empcontact ON empinfo.empid = empcontact.empid
                WHERE empcontact.email = '$email'");

              if ($query) {
                while ($row = mysqli_fetch_array($query)) {
                  // Display the fetched data in the HTML form
              ?>
                  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['firstname']); ?>'s Profile</h4><br>
                  <form class="form-horizontal style-form" method="post" name="profile">
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                      <div class="col-sm-4">
                        <input type="text" name="lastname" required="required" value="<?php echo htmlentities($row['lastname']); ?>" class="form-control" readonly>
                      </div>

                      <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                      <div class="col-sm-4">
                        <input type="text" name="firstname" required="required" value="<?php echo htmlentities($row['firstname']); ?>" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Course</label>
                      <div class="col-sm-4">
                        <input type="text" name="course" required="required" value="<?php echo htmlentities($row['department']); ?>" class="form-control" readonly>
                      </div>

                      <label class="col-sm-2 col-sm-2 control-label">Email</label>
                      <div class="col-sm-4">
                        <textarea name="email" required="required" class="form-control" readonly><?php echo htmlentities($row['email']); ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Contact</label>
                      <div class="col-sm-4">
                        <input type="text" name="contactno" required="required" value="<?php echo htmlentities($row['contact_no']); ?>" class="form-control" readonly>
                      </div>

                      <label class="col-sm-2 col-sm-2 control-label">Address</label>
                      <div class="col-sm-4">
                        <textarea name="address" required="required" class="form-control" readonly><?php echo htmlentities($row['address']); ?></textarea>
                      </div>
                    </div>
                  </form>

                  <form class="form-horizontal style-form" method="post" name="profile" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Profile Picture</label>
                      <div class="col-sm-4">
                        <input type="file" name="profile">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10" style="padding-left:18%">
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                      </div>
                    </div>
                  </form>

                  <script type="text/javascript">
                    <?php
                    if (isset($successMessage)) {

                      echo "swal({
            title: 'Success',
            text: '$successMessage',
            icon: 'success',
            button: 'OK'
        });";
                    }
                    ?>
                  </script>

              <?php
                }
              } else {
                // Handle query error
                echo "Error executing query: " . mysqli_error($bd);
              }

              // Close the database connection
              mysqli_close($bd);
              ?>

              <div class="form-group">
                <div class="col-sm-10" style="padding-left:25% ">
                </div>
              </div>

              </form>
            </div>
          </div>
        </div>



      </section>
    </section>
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
  <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom switch-->
  <script src="assets/js/bootstrap-switch.js"></script>

  <!--custom tagsinput-->
  <script src="assets/js/jquery.tagsinput.js"></script>

  <!--custom checkbox & radio-->

  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

  <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


  <script src="assets/js/form-component.js"></script>


  <script>
    //custom select box

    $(function() {
      $('select.styled').customSelect();
    });
  </script>

</body>

</html>