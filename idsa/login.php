<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Favicon -->
    <link rel="icon" href="ProjectImages/isdaLogo.png"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <!--Google Font CSS-->
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <!--Index Page CSS Link-->
    <link rel="stylesheet" href="css/bookIndex.css">

    <title>IDSA</title>
</head>
<body class="text-center">
	<div class="cover-container" id="cover">
		<header></header>
		<main role="main" class="inner cover">
      		<div class="formBox">
      			<div class="formheader">
      				<h1>Log In </h1>
      			</div>
            <form method="post" action="login.php" class="userLogIn">
              <?php include('errors.php'); ?>
              <div class="userFormGroup">
                <input type="text" name="username" placeholder="Username"/>
              </div>
              <div class="userFormGroup">
                <input type="password" name="password" placeholder="Password"/>
              </div>
              <div class="userFormGroup">
                <button type="submit" class="btn" name="login_User">Login</button>
              </div>
               <p>Not a Member?<a href="register.php" id="signbox-link">Sign Up</a></p>
            </form>
          </div>
		</main>
	</div>

</body>
</html>