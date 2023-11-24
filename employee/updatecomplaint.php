<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
if(isset($_GET['cid']))
    {
      $cid = $_GET['cid']; 
    }

  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remarks'];
$remarkDate=$_POST['date'];

$query=mysqli_query($bd, "INSERT INTO `complaint_remark`(`complaintNumber`,`status`,`remark`, `remarkdate`) 
values('$complaintnumber','$status','$remark', `$remarkDate`)");
$sql=mysqli_query($bd, "UPDATE tablecomplaints SET `status`='$status' WHERE complaintNumber='$complaintnumber'");

$successMessage = "You have successfully updated data";

  }

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Complaint </title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href= css/sidebar.css>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- for icons */  -->
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <!--- for table __-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.card{
    margin-left: 350px;
    margin-right: 350px;
    margin-bottom: 50px;
    margin-top: 20px;
    background-color: white;
    box-shadow: 0px 20px 20px rgba(0.1, 0.1, 0.1, 0.1);
  }
.form-group{
    margin-left: 50px;
    margin-right: 50px;
    margin-bottom: 10px;
}
h3{
    text-align: center;
}
.btn-primary {
    margin-left: 50px;
}
.btn-danger {
    margin-left: 5px;
}
</style>
</head>
<body>

<div class="card"> 
<form method="POST">
 
  
    <div class="form-group">
      <br>
  <label for="publication">Complaint Number</label>
  <input type="text" class="form-control"  name="cid" value="<?php echo $cid ?>"  readonly>
 </div>
 <div class="form-group" style="width:auto">
 <label for="stat"> Select status</label>
    <select id="status" name="status">
        <option value="red">In Process</option>
        <option value="blue">Closed</option>
    </select>
 </div>
    <div class="form-group"><i class="fa fa-book"></i>
      <label for="citations">Remarks</label>
      <textarea class="form-control"  name="remarks"></textarea>
   </div>
   <div class="form-group"><i class="fa fa-calendar"></i>
  <label for="publication">Date</label>
  <input type="date" class="form-control"  name="date"  required>
 </div>
   <button type="submit" class="btn btn-primary mt-6 mb-3" name="update"><i class="far fa-edit"></i>Update</button>
   <script type="text/javascript">
                <?php
                if (isset($successMessage)) {

                    echo "swal({
        title: 'Success',
        text: '$successMessage',
        icon: 'success',
        button: 'OK'
    });";
                }
                ?>
            </script>
<button type="reset" class="btn btn-danger mt-6 mb-3" name="cancel" onclick="window.location.href='complaint-details.php';">
    <i class="fa fa-times-circle"></i> Exit
</button>
  <br>

</form>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

 