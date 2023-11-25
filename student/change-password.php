<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    date_default_timezone_set('Asia/Manila');
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $currentPassword = md5($_POST['current_password']); // Assuming the current password is being entered
        $newPassword = md5($_POST['new_password']);

        // Retrieve the user's details from the database using the email
        $query = mysqli_query($bd, "SELECT * FROM tbstudcontact WHERE email='$email'");
        $userData = mysqli_fetch_assoc($query);

        if ($userData) {
            $storedPassword = $userData['password'];

            // Verify if the entered current password matches the stored password
            if ($currentPassword === $storedPassword) {
                // If the passwords match, update the password
                mysqli_query($bd, "UPDATE `tbstudcontact`
                                SET `password`='$newPassword' WHERE `email`='$email'");
                $successmsg = "Password Changed Successfully";
            } else {
                $errormsg = "Password or Email not match, try again.";
            }
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

        <title>STUDENT | Change Password</title>

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
                    <h3><i class="fa fa-angle-right"></i> Change Password</h3>

                    <!-- BASIC FORM ELELEMNTS -->
                    <div class="row mt">
                        <div class="col-lg-12">
                            <div class="form-panel">
                                <h4 class="mb"><b>Change Password</h4></b>

                                <?php if ($successmsg) { ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Well done!</b> <?php echo htmlentities($successmsg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($errormsg) { ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg); ?>
                                    </div>
                                <?php } ?>


                                <form class="form-horizontal style-form" method="post" name="chngpwd" onSubmit="return valid();">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" autocomplete="off" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Current Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Confirm New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10" style="padding-left:18% ">
                                            <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>



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
<?php } ?>