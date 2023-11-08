<?php
session_start();
error_reporting(0);
include("../conn.php");

if (isset($_POST['submit'])) {
    $srcode = $_POST['srcode'];
    $pass = $_POST['pass'];
    $query = mysqli_query($bd, "SELECT *
      FROM tbstudinfo
      JOIN studentpass ON tbstudinfo.`studid` = studentpass.`sr-code`
      WHERE tbstudinfo.`studid` = '$srcode' AND studentpass.password = '$pass';");
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        header("location: dashboard.php");
        exit();
    } else {
       $errorMessage="Invalid Credentials. Try again! ";

    
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .container {
            width: 300px;
            padding: 16px;
            background-color: #fff;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
            height: 100px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }
        .cancel {
            background: white;
            border:solid 2px black;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .cancel:hover {
            opacity: 0.8;
            background-color: red;
        }

     
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="../img/bsu.png" alt="Logo" class="logo">
        </div>
        <form method="post" action="">
            <label for="srcode"><b>Sr-Code</b></label>
            <input type="text" placeholder="Enter Sr-code" name="srcode" id="srcode" required>

            <label for="pass"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

            <button type="submit" name="submit">Login</button>
                <script>
                     <?php
                          if(isset($errorMessage))  {
                            echo "swal({
                                title: 'Error',
                                text: '$errorMessage',
                                icon: 'error',
                                button: 'OK'
                            });";
                          }
                        ?>
                </script>
            
                <input type="button" class="cancel" name="cancel" value="cancel" onclick="window.location.href='index.php'">
        </form>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
