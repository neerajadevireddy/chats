<?php 
include "dbcon.php";
session_start();
if(!isset($conn)){
    mysqli_connection_error();
}else{
 if(isset($_POST['submit'])){
     $username = mysqli_real_escape_string($conn,$_POST['username']);
     $phone = mysqli_real_escape_string($conn,$_POST['phone']);
     $password = mysqli_real_escape_string($conn,$_POST['password']);
     $cnfmpassword = mysqli_real_escape_string($conn,$_POST['cnfrmpassword']);
     if($password === $cnfmpassword){
    $hashpassword = password_hash($password,PASSWORD_DEFAULT);
     $sql = "INSERT INTO users (username,phone,password) VALUES ('$username','$phone','$hashpassword')";
     if(mysqli_query($conn,$sql)){
         header("location:http://localhost/chat/signin.php");
     }else{
         echo mysqli_error($conn);
     }
    }else{
        echo "confrim password correctly";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<form class="form"  method='post'>
<h1 class="form-title">Welcome  to <span style="color:rgb(163, 82, 238)">Neeranth</span></h1>
  <input type="text" id="username" name="username" placeholder="Username"><br>
  <input type="text" id="phone" name="phone" placeholder="Phone number"><br>
  <input type="password" id="password" name="password" placeholder="Password"><br>
  <input type="password" id="cnfrmpassword" name="cnfrmpassword" placeholder="Confrim Password"><br><br>
  <button class="btn btn-primary" name="submit">Submit</button>
  <br>
  <a href="./signin.php">signIn</a>
</form>
</div>
</body>
</html>
<?php 
}
?>
