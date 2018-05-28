<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root','', 'idsa');

// REGISTER USER, reg_user is the button clicked to register the user, displayed on the form. 
if (isset($_POST['reg_user'])) {
  // receive all input values from the form, receives all values entered by user.
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); } // sends an error mesaage to the user as form section is not filled in. 
  if (empty($email)) { array_push($errors, "Email is required"); } // sends an error mesaage to the user as form section is not filled in. 
  if (empty($password_1)) { array_push($errors, "Password is required"); } // sends an error mesaage to the user as form section is not filled in. 
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords entered do not match"); // sends an error mesaage to the user as form section is not filled in. 
  }

  // checks whether the unsername/email entered by the user are not already entered in the database. 
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists"); 
    }
	// if the username/email already exists, send an error meassage. 
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database, improves the security of the database
  	$query = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')"; // gets the values entered into the input forms, and inserts into the database, all values are entered in the 'users' table.  
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in"; // once complete, user is then logged in. 
  	header('location: indexbook.php'); // sends the user to the home page where content will be displayed. 
  }
} 

// LOGIN USER

if (isset($_POST['login_User'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required"); //if the username box is left empty then send error message.
  }
  if (empty($password)) {
    array_push($errors, "Password is required");//if the password box is left empty then send error message.
  }

  if (count($errors) == 0) {
    $password = md5($password); // password encrypted for security. 
    $query = "SELECT * FROM users WHERE username ='$username' AND password='$password'"; //finds the username and password which match the database.
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: indexbook.php');// results are shown on the index page. 
    }else {
      array_push($errors, "Wrong username/password combination");// error handling for details entered. 
    }
  }

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  // //log user in from log on page
  // if(isset($_POST['login_User'])) {
  //   $username = mysqli_real_escape_string($db, $_POST['username']);
  //   $password = mysqli_real_escape_string($db, $_POST['password']);
  //   // ensure details are entered correct
  //   if(empty($username)) {
  //     array_push($errors, "Username is required");
  //   }
  //   if(empty($password)) {
  //     array_push($errors, "Password is required");
  //   }
  // }
}

?>

