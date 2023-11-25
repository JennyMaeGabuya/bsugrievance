

<?php
/* ALTERNATIVE CODEEE FOR LOGOUT

session_start();
$_SESSION['alogin'] = ""; // Assigning the value instead of comparing
session_unset();
// session_destroy(); /
$_SESSION['errmsg'] = "You have successfully logged out";
?>
<script language="javascript">
document.location = "loginadmin.php";
</script>
*/


session_start();
header("Location: emplogin.php");
exit; 
?>