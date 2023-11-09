<style>
        .site-footer .text-center {
            padding: 2px;
        }

        /* Style for the navigation bar */
        #sidebar {
            background-color: grey;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            z-index: 2;
        }
</style>

<aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/bsu.PNG" class="img-circle" width="60"></a></p>
                   <?php $query=mysqli_query($bd, "SELECT concat(firstname,' ', lastname) as fullname from tbstudinfo  where email='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
              	  <h5 class="centered"><?php echo htmlentities($row['fullname']);?></h5>
                  <?php } ?>
              	  	
                  <li class="mt">
                      <a href="dashboard.php">
                     
                      <i class="fa fa-home"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                      <i class="fa fa-sliders"></i>
                          <span>Account Setting</span>
                      </a>
                    
                      <ul class="sub">
                        <li><a href="profile.php"><i class="fa fa-user"></i>View Profile</a></li>
                        <li><a href="change-password.php"><i class="fa fa-lock"></i> Change Password</a></li>
                    </ul>

                  </li>
                  <li class="sub-menu">
                      <a href="register-complaint.php" >
                      <i class="fa fa-file-text"></i>
                          <span>File Complaint</span>
                      </a>
                    </li>
                  </li>
                  <li class="sub-menu">
                      <a href="student/complaint-history.php" >
                      <i class="fa fa-clock-o"></i>
                          <span>Complaint History</span>
                      </a>
                      
                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>