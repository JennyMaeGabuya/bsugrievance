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

    <title>EMPLOYEE | Complaint Details</title>

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
        var popUpWin = 0;

        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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

        th,
        td {
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

    <?php include('includes/sidebar.php'); ?>
    <?php include('includes/header.php'); ?>
    <br>
    <div class="card custom-container">
        <h1 onclick="goBack()" style="cursor: pointer;">Grievance Details</h1>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>

        <?php
        /*   	
	 $st='closed';
		 $query=mysqli_query($bd, "select tblcomplaints.*,users.fullName as name,category.categoryName
		  as catname from tblcomplaints 
		 join users on users.id=tblcomplaints.userId 
		 join category on category.id=tblcomplaints.category 
		 where tblcomplaints.complaintNumber='".$_GET['cid']."'");
		 */

        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];

            $query = mysqli_query($bd, "SELECT 
                 tablecomplaints.*, ti.studid as studid,  CONCAT(ti.firstname, ' ', ti.lastname) AS fullname, c.categoryName AS catname
                 FROM tablecomplaints 
                 JOIN tbstudinfo ti ON ti.studid = tablecomplaints.`sr-code`
                 JOIN category c ON c.category_id = tablecomplaints.category_id
                 WHERE tablecomplaints.complaintNumber=$cid");

            if (!$query) {
                die("Error: " . mysqli_error($bd));
            }

            echo "<table>";
            while ($row = mysqli_fetch_array($query)) {
                $id = $row['complaintNumber'];
                $studid = $row['studid'];

                echo "<tr>
                     <th>Complaint Number</th>
                     <td>" . htmlentities($row['complaintNumber']) . "</td>
                 </tr>";
                echo "<tr>
                     <th>Complainant Name</th>
                     <td>" . htmlentities($row['fullname']) . "</td>
                 </tr>";
                echo "<tr>
                     <th>Complaint Details</th>
                     <td>" . htmlentities($row['complaintDetails']) . "</td>
                 </tr>";
                $cfile = htmlentities($row['complaintFile']);
                echo "<tr>
                     <th>File / Proof</th>
                     <td>";
                //=========== DISPLAY THE FILE===================================================
                if ($cfile == "" || $cfile == "NULL") {
                    echo "File NA";
                } else {
                    echo '<a href="../student/complaintdocs/' . htmlentities($row['complaintFile']) . '">View File</a>';
                }
                echo "</td></tr>";
                echo "<tr>
                 <th>Status</th>
                 <td>";

                if ($row['status'] == "" || $row['status'] == "NULL") {
                    echo "Not Process Yet";
                } else {
                    echo htmlentities($row['status']);
                }

                echo "</td></tr>";

                $ret = mysqli_query($bd, "SELECT 
                     complaint_remark.remark AS remark,
                     complaint_remark.status AS status,
                     complaint_remark.remarkDate AS rdate 
                     FROM complaint_remark 
                     JOIN tablecomplaints ON tablecomplaints.complaintNumber = complaint_remark.complaintNumber
                     WHERE complaint_remark.complaintNumber='" . $_GET['cid'] . "'");

                while ($row = mysqli_fetch_array($ret)) {
                    $date = date('Y-m-d', strtotime($row['rdate'])); // Format date to 'YYYY-MM-DD'
                    $remark = $row['remark'];
                    echo "<tr>
                         <th>Remark</th>
                         <td>$date | $remark</td>
                     </tr>";
                }
                echo "<tr>
                     <th>Action</th>
                     <td>
                         <a href='updatecomplaint.php?update&cid={$id}' class='btn btn-primary'>
                             <i class='fa fa-edit'></i> Update
                         </a>
                         <a href='http://localhost/bsugrievance/employee/studentprofile.php?studid={$studid}' class='btn btn-primary'>
                             <i class='fa fa-user'></i> View Student Information
                         </a>
                     </td>
                     </tr>";
            }
            echo "</table>";
        } else {
            echo "Complaint ID is not set!";
        }
        ?>
    </div>

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