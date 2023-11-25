<style>
    .site-footer .text-center {
        padding: 2px;
    }

    /* Style for the navigation bar panel */
    #sidebar {
        background-color: grey;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        z-index: 2;
    }

    ul.sidebar-menu li a {
        /* font color of menu */
        color: white;
    }

    ul.sidebar-menu li ul.sub li:hover {
        /* Hover effect for submenu items */
        margin-bottom: 0;
        margin-left: 0;
        margin-right: 0;
        color: black;
        background-color: #68dff0;
        /*hover for dropdown*/
    }

    ul.sidebar-menu li ul.sub li a {
        /* Font color of submenu items */
        color: black;
        font-weight: bold;
        transition: color 0.3s ease-in-out;
    }

    ul.sidebar-menu li ul.sub li:hover a {
        /* Hover effect for changing text color */
        color: black;

    }

    ul.top-menu>li>.logout:hover {
        color: white;
    }

    h4.centered {
        color: whitesmoke;
        font-weight: bold;
    }
</style>

<aside>

    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <?php
            include('includes/config.php');
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (strlen($_SESSION['login']) == 0) {
                header('location:index.php');
                exit; // Ensure to exit after redirecting
            }

            // Fetch the profile picture path for the logged-in user
            $email = $_SESSION['login'];
            $query = mysqli_query($bd, "SELECT profile_picture FROM tbempcontact WHERE email = '$email'");

            if ($query) {
                $row = mysqli_fetch_assoc($query);
                $profilePictureFileName = $row ? $row['profile_picture'] : null;

                // Define the base path for profile pictures
                $basePath = "profilepicture/";

                // Check if the profile picture exists or use a default image path
                $profileImagePath = $profilePictureFileName && file_exists($basePath . $profilePictureFileName) ?
                    $basePath . $profilePictureFileName : "profilepicture/bsu.png"; // Default image path
            } else {
                // Handle query error
                $profileImagePath = "profilepicture/bsu.png"; // Default image path if there's an error
                echo "Error fetching profile picture: " . mysqli_error($bd);
            }
            ?>

            <!-- Display the updated or default profile picture in the sidebar -->
            <p class="centered"><a href="empprofile.php"><img src="<?php echo $profileImagePath; ?>" class="img-circle" width="80"></a></p>

            <?php
            include('includes/config.php');
            $email = mysqli_real_escape_string($bd, $_SESSION['login']);
            $query = mysqli_query($bd, "SELECT CONCAT(einfo.firstname, ' ', einfo.lastname) AS fullname 
            FROM tbempinfo AS einfo
            INNER JOIN tbempcontact AS econtact ON einfo.empid = econtact.empid
            WHERE econtact.email = '$email'");

            if ($query) {
                while ($row = mysqli_fetch_array($query)) {
            ?>
                    <h4 class="centered"><?php echo htmlentities($row['fullname']); ?></h4>
            <?php
                }
            } else {
                // Handle query error
                echo "Error executing query: " . mysqli_error($bd);
            }
            ?>

            <li class="mt">
                <a href="dashboard.php">

                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-file-text"></i>
                    <span> Manage Complaint</span>
                </a>

                <ul class="sub">
                    <li><a href="pendingcomplaint.php"><i class="fa fa-user" style="color: black;"></i>Not Process Yet</a></li>
                    <li><a href="ongoingcomplaint.php"><i class="fa fa-file-text" style="color: black;"></i> Pending Complaint</a></li>
                    <li><a href="closedcomplaint.php"><i class="fa fa-lock" style="color: black;"></i> Closed Complaints</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-sliders"></i>
                    <span>Account Setting</span>
                </a>

                <ul class="sub">
                    <li><a href="empprofile.php"><i class="fa fa-user" style="color: black;"></i>View Profile</a></li>
                    <li><a href="change-password.php"><i class="fa fa-lock" style="color: black;"></i> Change Password</a></li>
                </ul>

            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>