<?php
//error_reporting(0);
session_start();
include('config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']); 
  $sql="INSERT INTO  user-login(username, password) VALUES(:username,:password)";
  $query = $conn->prepare($sql);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  if ($query ->execute([":username" => $username, ":password"=>$password])){
    $message = "Register Successfull. You can continue Login";
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
<h2 align="center">Please Register</h2>
<br/>
<form method="post" name="signup" onSubmit="return valid();">
 <div class="form-group">
   <label>USERNAME</label>
   <input type="text" class="form-control" name="username" placeholder="Username*" required="required">
 </div>
 <div class="form-group">
   <label>ENTER PASSWORD</label>
   <input type="password" class="form-control" name="password" placeholder="Password*" required="required">
 </div>
 <div class="form-group">
   <label>CONFIRM PASSWORD</label>
   <input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password*" required="required">
 </div>
 <div class="form-group">
   <button class="btn btn-primary" type="submit" name="signup" id="submit">REGISTER</button>
 </div>
</form>
</div>
</body>
</html>
 