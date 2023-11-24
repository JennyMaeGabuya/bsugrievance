<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit(); // Exit to prevent further execution if the session is not active
}

// Function to close the window
function closeWindow()
{
    echo '<script language="javascript" type="text/javascript">window.close();</script>';
}

// Function to print the window
function printWindow()
{
    echo '<script language="javascript" type="text/javascript">window.print();</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>ADMIN | Manage Users</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="anuj.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        .form {
            display: inline;
            display: flex;
            justify-content: end;
        }

        /* Style for the overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white */
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        /* Style for the loading spinner */
        .spinner {
            border: 6px solid #f3f3f3;
            /* Light grey */
            border-top: 6px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- Overlay and loading spinner -->
    <div class="overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>
</head>

<body>
    <div style="margin-left:50px;">
        <form name="updateticket" id="updateticket" method="post">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php
                if (isset($_GET['empid'])) {
                    $empId = $_GET['empid'];

                    $query = "SELECT * 
                                FROM tbempinfo 
                                JOIN tbempcontact ON tbempinfo.empid = tbempcontact.empid 
                                WHERE tbempinfo.empid='" . $empId . "'";
                    $result = mysqli_query($bd, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                ?>
                        <br>
                        <tr>
                            <br>
                            <td colspan="2"><b style="font-size: 1.5em;"><?php echo htmlentities($row['firstname'] . ' ' . $row['lastname']); ?> 's Profile</b></td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr height="50">
                            <td><b>Employee ID: </b></td>
                            <td><?php echo htmlentities($row['empid']); ?></td>
                        </tr>

                        <tr height="50">
                            <td><b>Department: </b></td>
                            <td><?php echo htmlentities($row['department']); ?></td>
                        </tr>

                        <tr height="50">
                            <td><b>Email: </b></td>
                            <td><?php echo htmlentities($row['email']); ?></td>
                        </tr>

                        <tr height="50">
                            <td><b>Contact No: </b></td>
                            <td><?php echo htmlentities($row['contact_no']); ?></td>
                        </tr>

                        <tr height="50">
                            <td><b>Address: </b></td>
                            <td><?php echo htmlentities($row['address']); ?></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <br>
                                <input name="Submit2" type="button" class="btn btn-outline-danger btn-sm" value="Close this Window" onClick="closeWindow()" style="cursor: pointer;" />
                            </td>
                        </tr>

                        <script>
                            function closeWindow() {
                                window.close();
                                return false;
                            }
                        </script>

                <?php
                    } else {
                        echo '<tr><td colspan="2"><div class="alert alert-warning">No matching records found.</div></td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="2"><div class="alert alert-warning">Invalid student ID.</div></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
</body>

</html>