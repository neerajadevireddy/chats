<?php 
include "dbcon.php";
session_start();
if(!isset($conn)){
    mysqli_connection_error();
}else{
  if(isset($_POST['submit'])){
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM users where username='$username'";
        if($res = mysqli_query($conn,$sql)){
            if(mysqli_num_rows($res)>=1){
            if($row = mysqli_fetch_assoc($res)){
                if(password_verify($password,$row['password'])){
                    $_SESSION['USER'] = $row['username'];
                    $_SESSION['USERID']= $row['userid'];
                    $_SESSION['PHONE']= $row['phone'];
                    header("location:http://localhost/chats/index.php");
                }else{
                    echo "please enter the crct password ";
                } 
            }else{
                echo mysqli_error($conn);
            }}else{
                echo "please signup first";
            }

        }else{
         echo mysqli_error($conn);
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
<form class="form" method="post">
<h1 class="form-title">Welcome  to <span style="color:rgb(163, 82, 238)">Neeranth</span></h1>   
  <input type="text" id="username" name="username" placeholder="Enter Username"><br>
  <input type="password" id="password" name="password" placeholder="Enter Password"><br>
  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
  <br>
  <a href="signup.php"> signup</a>
</form>

</div>
</body>
</html>
<?php 
}
?>