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

    ul.sidebar-menu li a {  /* font color of menu */
        color: white;
    }

    ul.sidebar-menu li ul.sub li:hover {
        /* Hover effect for submenu items */
        background: white;
        margin-bottom: 0;
        margin-left: 0;
        margin-right: 0;
        color: black;
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
</style>

<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="assets/img/bsu.png" class="img-circle" width="80"></a></p>
            <?php
$email = mysqli_real_escape_string($bd, $_SESSION['login']);

$query = "SELECT CONCAT(ainfo.firstname, ' ', ainfo.lastname) AS fullname 
          FROM tbempinfo AS ainfo 
          JOIN tbempcontact ON ainfo.empid = tbempcontact.empid
          WHERE tbempcontact.email = '$email'";

$result = mysqli_query($bd, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <h5 class="centered"><?php echo htmlentities($row['fullname']); ?></h5>
        <?php
    }
    mysqli_free_result($result);
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
                    <i class="fa fa-sliders"></i>
                    <span> Manage Complaint</span>
                </a>

                <ul class="sub">
                    <li><a href="notprocesscomplaint.php"><i class="fa fa-user" style="color: black;"></i>Not Process Yet</a></li>
                    <li><a href="pendingcomplaint.php"><i class="fa fa-file-text" style="color: black;"></i> Pending Complaint</a></li>
                    <li><a href="closedcomplaint.php"><i class="fa fa-lock" style="color: black;"></i> Closed Complaints</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="manageuser.php">
                    <i class="fa fa-file-text"></i>
                    <span>Manage users</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="addcategory.php">
                    <i class="fa fa-plus"></i>
                    <span>Add Category</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="userlogin.php">
                    <i class="fa fa-bookmark"></i>
                    <span>User Login Log</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
