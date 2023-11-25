<?php
session_start();
error_reporting(0);
include('includes/config.php');

date_default_timezone_set('Asia/Manila'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>ADMIN | Not Process Complaints</title>

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

	<script language="javascript" type="text/javascript">
		var popUpWin = 0;

		function popUpWindow(URLStr, left, top, width, height) {
			if (popUpWin) {
				if (!popUpWin.closed) popUpWin.close();
			}
			popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 500 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
		}
	</script>
</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include('includes/sidebar.php'); ?>
				<div class="span9">
					<div class="content">

						<div class="module" style="margin-left: 250px;width:800px;">
							<div class="module-head">
								<h3>Not Process Complaints</h3>
							</div>
							<div class="module-body table">

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display">
									<thead>
										<tr>
											<th>Complaint No</th>
											<th>Complainant Name</th>
											<th>Date Filed</th>
											<th>Status</th>

											<th>Action</th>

										</tr>
									</thead>

									<tbody>
										<?php
										/* $query=mysqli_query($bd, "select tablecomplaints.*,CONCAT(einfo.firstname, ' ', einfo.lastname) AS fullname 
FROM tbempinfoas name from tblcomplaints 
join users on users.id=tblcomplaints.userId where tblcomplaints.status is null ");  */

										$query = mysqli_query($bd, "SELECT tablecomplaints.*, CONCAT(tbstudinfo.firstname, ' ', tbstudinfo.lastname) AS fullname
FROM tablecomplaints
JOIN tbstudinfo ON tablecomplaints.`sr-code` = tbstudinfo.studid
WHERE tablecomplaints.status IS NULL;");
										while ($row = mysqli_fetch_array($query)) {
											$cid = $row['complaintNumber'];

										?>
											<tr style="text-align: center">
												<td><?php echo $cid; ?></td>
												<td><?php echo htmlentities($row['fullname']); ?></td>
												<td><?php echo htmlentities($row['regDate']); ?></td>

												<td><button type="button" class="btn btn-theme04"><i class="fa fa-hourglass-start" style="font-size:16px;color:black;"></i> Not Process Yet</button></td>

												<td> <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']); ?>"> View Details</a>
												</td>
											</tr>

										<?php  } ?>
									</tbody>
								</table>
							</div>
						</div>

					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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