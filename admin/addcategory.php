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
		$_SESSION['msg'] = "The category has been created successfully!";
		header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page to avoid message persisting after a page refresh
		exit();
	}

	if (isset($_GET['del'])) {
		mysqli_query($bd, "delete from category where category_id = '" . $_GET['category_id'] . "'");
		$_SESSION['delmsg'] = "Category deleted!";
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

									<!-- Submit button -->
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" name="submit" class="btn btn-primary">Create</button>
										</div>
									</div>
								</form>

								<!-- Search -->
								<div class="row">
									<div class="col-md-6 col-md-offset-9">
										<form method="GET" action="">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
												<input type="text" class="form-control" style="width: 200px; color: black; font-weight: bold;" placeholder="Search by Category Name" name="search" id="search">
												<span class="input-group-btn">
												</span>
											</div>
										</form>
									</div>
								</div>

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
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="categoryTableBody"></tbody>

											<?php
											$query = "SELECT * FROM category";

											// Check if search query is set
											if (isset($_GET['search']) && !empty($_GET['search'])) {
												$search = $_GET['search'];
												$query .= " WHERE categoryName LIKE '%$search%'";
											}

											$query .= " ORDER BY category_id DESC";

											$result = mysqli_query($bd, $query);
											$cnt = 1;
											while ($row = mysqli_fetch_array($result)) {
											?>
												<tr>
													<td><?php echo htmlentities($row['category_id']); ?></td>
													<td><?php echo htmlentities($row['categoryName']); ?></td>
													<td><?php echo htmlentities($row['categoryDescription']); ?></td>
													<td><?php echo htmlentities($row['creationDate']); ?></td>
													<td>
														<a href="edit-category.php?category_id=<?php echo $row['category_id'] ?>"><i class="glyphicon glyphicon-pencil icon-spacing"></i></a>
														<a href="category.php?category_id=<?php echo $row['category_id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="glyphicon glyphicon-trash"></i></a>
													</td>
												</tr>

											<?php
												$cnt = $cnt + 1;
											}
											?>

											<!-- JavaScript for live search -->
											<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
											<script>
												$(document).ready(function() {
													$('#search').on('keyup', function() {
														var searchText = $(this).val().toLowerCase();
														$.ajax({
															method: 'GET',
															url: 'search_category.php',
															data: {
																search: searchText
															},
															success: function(response) {
																$('#categoryTableBody').html(response);
															}
														});
													});
												});
											</script>

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

			<!--======================javascript  to make the dropdown of header work  =================================-->
			<!-- js placed at the end of the document so the pages load faster -->
			<script src="assets/js/jquery.js"></script>
			<script src="assets/js/jquery-1.8.3.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
			<script src="assets/js/jquery.scrollTo.min.js"></script>
			<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
			<script src="assets/js/jquery.sparkline.js"></script>
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
			<script src="assets/js/common-scripts.js"></script>
		</section>
	</body>

	</html>
<?php } ?>