<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	date_default_timezone_set('Asia/Manila');
	$currentTime = date('d-m-Y h:i:s A', time());

	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$description = $_POST['description'];
		$sql = mysqli_query($bd, "insert into category(categoryName,categoryDescription) values('$category','$description')");
		$_SESSION['msg'] = "Category Created !!";
	}

	if (isset($_GET['del'])) {
		mysqli_query($bd, "delete from category where id = '" . $_GET['category_id'] . "'");
		$_SESSION['delmsg'] = "Category deleted !!";
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

		<title>ADMIN | Add Category</title>
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

	<body>
		<section id="container">
			<?php include("includes/header.php"); ?>
			<?php include("includes/sidebar.php"); ?>
			<section id="main-content">
				<section class="wrapper">
					<h3><i class="fa fa-angle-right"></i> Add Category</h3>
					<div class="row mt">
						<div class="col-lg-12">
							<div class="form-panel">
								<h4 class="mb"><b>Add Category</h4></b>

								<!-- Form for adding categories -->
								<form class="form-horizontal style-form" method="post" name="Category">
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Category Name: </label>
										<div class="col-sm-10">
											<input type="text" name="category" autocomplete="off" class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Description: </label>
										<div class="col-sm-10">
											<textarea class="form-control" name="description" rows="5"></textarea>
										</div>
									</div>

									<!-- Success or error messages -->
									<?php if (isset($_SESSION['msg'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } elseif (isset($_SESSION['delmsg'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<!-- Submit button -->
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="submit" class="btn btn-primary">Create</button>
										</div>
									</div>
								</form>


								<!-- Table to display categories -->
								<div class="module">
									<div class="module-head">
										<h3>Manage Categories</h3>
									</div>
									<div class="module-body table">
										<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Category</th>
													<th>Description</th>
													<th>Creation Date</th>
													<th>Last Updated</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = mysqli_query($bd, "select * from category");
												$cnt = 1;
												while ($row = mysqli_fetch_array($query)) {
												?>
													<tr>
														<td><?php echo htmlentities($cnt); ?></td>
														<td><?php echo htmlentities($row['categoryName']); ?></td>
														<td><?php echo htmlentities($row['categoryDescription']); ?></td>
														<td><?php echo htmlentities($row['creationDate']); ?></td>
														<td><?php echo htmlentities($row['updationDate']); ?></td>
														<td>
															<a href="edit-category.php?category_id=<?php echo $row['category_id'] ?>"><i class="glyphicon glyphicon-pencil icon-spacing"></i></a>
															<a href="category.php?category_id=<?php echo $row['category_id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="glyphicon glyphicon-trash"></i></a>
														</td>
													</tr>

												<?php
													$cnt = $cnt + 1;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</section>
			<?php include('includes/footer.php'); ?>
			<!-- JavaScript and jQuery scripts -->
			<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
			<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
			<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
			<script src="scripts/datatables/jquery.dataTables.js"></script>
			<script>
				$(document).ready(function() {
					// You can put jQuery code here to execute after the document is ready
					$('.datatable-1').dataTable();
					$('.dataTables_paginate').addClass("btn-group datatable-pagination");
					$('.dataTables_paginate > a').wrapInner('<span />');
					$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
					$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
				});
			</script>

		</section>
	</body>

	</html>
<?php } ?>