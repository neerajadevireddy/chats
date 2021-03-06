<?php 
    session_start();
    include "dbcon.php";
    if($_SESSION['USER']){
        // echo $_SESSION['USER'];
        $user = $_SESSION['USER'];
        $sql = "SELECT * from users where username!='$user'";
        $res = mysqli_query($conn,$sql);
        $numrows= mysqli_num_rows($res);

        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./css/chat.css">
        <title>Chats</title>
    </head>
    <body>
        <div class="container-sm">
            <div style="display:flex;justify-content:space-between">
            <p style="padding-left:10px;padding-top:10px;font-size:2.4rem">Hello <span style="color:rgb(163, 82, 238)"><?=$_SESSION['USER']?>!</span></p>
            <a  href="./logout.php" class="btn btn-dabger" style="padding-right:10px;padding-top:10px;font-size:2rem">logout</a>
        </div>
            <div>
                <h3 class="text-center">Friends</h3>
                <div class="chats">
                    <?php 
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                        <a class="chat" href="messages.php?toUserId=<?php echo $row['userid']?>&toUser=<?php echo $row['username']?>">
                            <div class="profile"></div>
                            <p><?php echo $row['username'] ?></p>
                        </a>
                        <?php 
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    }else{
        header("location:http://localhost/chats/signin.php");
    }
?>