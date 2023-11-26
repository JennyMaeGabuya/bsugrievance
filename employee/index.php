<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BatStateU-Lipa | Grievance System</title>

  <style>
    body {
      padding: 0;
      font-family: Arial, sans-serif;
      margin-left: 15%;
      margin-right: 15%;
    }

    .form {
      background-color: #fff;
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.70);
    }

    .head {
      display: flex;
      font-weight: bold;
      font-size: large;
      font-family: 'Times New Roman', Times, serif;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(to right, white, red);
      color: #fff;
      padding: 5px;
    }

    .logo {
      display: flex;
      align-items: center;
      margin-left: 3%;
    }

    .logo img {
      width: 60px;
      height: 50px;
      margin-right: 10px;
    }

    .menu {
      display: flex;
      list-style: none;

    }

    .menu li {
      margin-right: 10px;
    }

    .menu a {
      color: #fff;
      text-decoration: none;
    }

    .h3 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: medium;
      font-style: italic;
      font-weight: lighter;
    }

    footer {
      background: red;
      padding: 0.5px;
      color: #fff;
      text-align: center;
      font-size: small;
    }

    .container {
      font-family: 'Times New Roman', Times, serif;
      border: solid 1.5px black;
      margin-top: 100px;
      margin-left: 100px;
      margin-right: 100px;
      padding: 30px;
      align-items: center;
      display: block;
      justify-content: center;
      text-align: center;

    }

    .text {
      font-size: larger;
      text-align: center;
      justify-content: center;
      margin-top: 0%;
      color: rgb(224, 22, 28);
      margin-bottom: 100px;

    }

    .img {
      margin-right: 30%;
    }
  </style>
</head>

<br>
<div class="form">

  <body>

    <div class="head">
      <div class="logo">
        <img src="../img/bsu.png">
      </div>

      <ul class="menu">
        <li><a href="emplogin.php">Login</a></li>

      </ul>
    </div>

    <div class="container">
      <h1> BATSTATE-U LIPA STUDENT GRIEVANCE SYSTEM</h1>
      <h3 class="h3">Your voice, Your campus, Your change!</h4>
    </div>

    <div class="text">
      <h5>BATANGAS STATE UNIVERSITY - THE NATIONAL ENGINEERING UNIVERSITY (LIPA CAMPUS)</h5>
    </div>

    <footer>
      <p>&copy; 2023 Dimaculangan, Gabuya, Magnaye, Peloramas, Ramos</p>
    </footer>
  </body>

</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!--BACKSTRETCH-->
	<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
	<script>
		$.backstretch("assets/img/comp1.jpg", {
			speed: 500
		});
	</script>
  
</html>