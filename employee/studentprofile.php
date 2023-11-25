
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('includes/config.php');




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee | Complaint Details</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<!-- Bootstrap core CSS     link for sidebar panel-->
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
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

<style>

.card {
            margin-top: 50px;
            width: auto;
            margin-left: 300px;
            margin-right: 200px;
            margin-bottom: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 20px 20px rgba(0.1, 0.1, 0.1, 0.1);
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 10px;
            margin: 5%;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
           h1 {
            text-align: center;
        }
		.custom-container {
			margin-top: 70px;
    width: auto;
    margin-left: 300px;
    margin-right: 100px;
    margin-bottom: auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0px 20px 20px rgba(0.1, 0.1, 0.1, 0.1);
	height: auto;
}
        </style>
</head>
<body>

<?php include('includes/sidebar.php');?>				
<?php include('includes/header.php');?>
<br>
<div class="card custom-container">
 <h1>Student Information</h1>
               
     <?php
         if (isset($_GET['studid'])) {
            $studid = $_GET['studid'];
        
            // Prepare the SQL statement
            $stmt = mysqli_prepare($bd, "SELECT 
                tbstudcontact.*,ti.studid as studid, ti.course AS course, CONCAT(ti.firstname, ' ', ti.lastname) AS fullname 
                FROM tbstudcontact
                JOIN tbstudinfo ti ON ti.studid = tbstudcontact.studid
                WHERE tbstudcontact.studid = ?");
            
            // Bind parameters and execute the query
            mysqli_stmt_bind_param($stmt, 's', $studid);
            mysqli_stmt_execute($stmt);
        
            // Get the result set
            $result = mysqli_stmt_get_result($stmt);
            

            echo "<table>";
            // Fetch data and process results
            while ($row = mysqli_fetch_assoc($result)) {
                $studid=$row['studid'];
                $name= $row['fullname'];
                $course= $row['course'];
                $email= $row['email'];
                $contact_no= $row['contact_no'];
                $address= $row['address'];
                

                echo "<tr>
                <th>student Name</th>
                <td>$name</td>
            </tr>";
            echo "<tr>
                <th>Course</th>
                <td>$course</td>
            </tr>";
            echo "<tr>
                <th>email</th>
                <td>$email</td>
            </tr>"; 
            echo "<tr>
                  <th>Contact Number</th>
                <td>$contact_no</td>
              </tr>";
            echo "<tr>
                 <th>Address</th>
                  <td>$address</td>
             </tr>";  

            }
        echo "</table>";   
        } 
        else {
            echo "studid parameter is not set!";
        }
         ?>
    <button type="reset" class="btn btn-danger mt-6 mb-3" name="cancel" onclick="f2()"style="width: auto; margin: 0 auto; display: block;">
    <i class="fa fa-times-circle"></i> Exit
</button>

     </div>
     
     <script>
function f2() {
    window.location.href = 'dashboard.php'; // Replace 'main-page.php' with your main page URL
}
</script>			


					

						
						
					

<?php include('includes/footer.php');?>

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
		} );
	</script>

	 
    <!-- js placed at the end of the document so the pages load faster   FOR SIDEBAR PANELL-->
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
</html>