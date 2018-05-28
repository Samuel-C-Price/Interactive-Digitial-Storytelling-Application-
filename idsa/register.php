<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
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
      				<h1>Register</h1>
      			</div>
            <form class="userSignUp" method="post" action="register.php">
              <?php include('errors.php'); ?>
              <div class="userFormGroup">
                <input type="text" name="username"  value="<?php echo $username; ?>" placeholder="Userame" />
              </div>
              <div class="userFormGroup">
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email"/>
              </div>
              <div class="userFormGroup">
                <input type="password" name="password_1" placeholder="Password"/>
              </div>
              <div class="userFormGroup">
                <input type="password" name="password_2" placeholder=" Confirm Password"/>
              </div>
              <div class="userFormGroup">
                <button type="submit" class="btn btn-default" name="reg_user">Sign Up</button>
              </div>
               <p>Already a member?<a href="login.php" id="signbox-link">Sign in</a></p>
            </form>
          </div>
		</main>
	</div>

</body>
</html>