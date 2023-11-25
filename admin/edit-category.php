<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
} else {
    date_default_timezone_set('Asia/Manila');
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $description = $_POST['description'];
        $id = intval($_GET['category_id']);

        $sql = mysqli_query($bd, "UPDATE category SET categoryName='$category', categoryDescription='$description' WHERE category_id='$id'");

        if ($sql) {
            $_SESSION['msg'] = "The category has been updated successfully!";
            header("Location: addcategory.php");
            exit();
        } else {
            $_SESSION['msg'] = "Failed to update category";
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

    <title>ADMIN | Update Category</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <style>
        .glyphicon {
            font-size: 16px;
        }

        .glyphicon.glyphicon-trash {
            color: red;
        }

        .icon-spacing {
            margin-right: 2px;
        }
    </style>
</head>

<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<body>
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Update Category</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <?php if (isset($_POST['submit'])) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                            <?php } ?>
                            <br />

                            <h4 class="mb"><b>Update Category</b></h4>

                            <form class="form-horizontal style-form" method="post" name="Category">
                                <?php
                                if (isset($_GET['category_id'])) {
                                    $id = intval($_GET['category_id']);
                                    $query = mysqli_query($bd, "SELECT * FROM category WHERE category_id='$id'");
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category Name: </label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="Enter Category Name" class="form-control" name="category" value="<?php echo  htmlentities($row['categoryName']); ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Description: </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" placeholder="Enter Category Description" name="description" rows="5" required><?php echo  htmlentities($row['categoryDescription']); ?></textarea>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "Category ID not found in URL";
                                }
                                ?>

                                <div class="control-group">
                                    <div class="controls" style="padding-left: 185px;">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div><br>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <?php include('includes/footer.php'); ?>

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
</body>

</html>