<?php
session_start();
include('config.php');
error_reporting(0);
if(isset($_POST["login"]))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $sql ="SELECT * FROM user-login WHERE username=:username and password=:password";
  $query= $conn -> prepare($sql);
  $query-> bindParam(':username', $username, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    $_SESSION['login']=$_POST['username'];
    $currentpage=$_SERVER['REQUEST_URI'];
    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
  } else{
    
    echo "<script>alert('Invalid Details');</script>";

  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login or Register to SherylApp</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <br /><br />
  <div class="container">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="register.php">REGISTER</a>
      <a class="navbar-brand" href="login.php">LOGIN</a>
    </div>
  </div>
</nav>
<br />
<h2 align="center">Please Login</h2>
<br />
<form method="post">
 <div class="form-group">
   <label>ENTER USERNAME</label>
   <input type="text" class="form-control" name="username" placeholder="Username*">
 </div>
 <div class="form-group">
   <label>ENTER PASSWORD</label>
   <input type="password" class="form-control" name="password" placeholder="Password*">
 </div>
 <div class="form-group">
   <button class="btn btn-primary" type="submit" name="login">LOGIN</button>
 </div>
</form>
</div>
</body>
</html>
 