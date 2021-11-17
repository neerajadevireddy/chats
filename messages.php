<?php 
session_start();

include "dbcon.php";

if($_SESSION['USER']){
    if($_GET['toUser']){
        $userId = $_SESSION['USERID'];
        $toUserId = $_GET['toUserId'];
        $toUser = $_GET['toUser'];
        $user = $_SESSION['USER'];
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="./css/messages.css">
            <title>Document</title>
        </head>
        <body class="main">
            <a href="http://localhost/chats/index.php" class="btn btn-primary" style="position: absolute;top:10px;left:10px">Back</a>
            <div class="chatbox">
               
                <div id="msgs">

                </div>
                <form class="input" id="messageForm">
                    <input type="hidden" name="toUserId" id="toUserId" value="<?= $toUserId ?>"/>
                    <input type="text" placeholder="Enter your message" class="form-control" name="message" id="message"/>
                    <button class="btn btn-primary" type="submit" name="submitbtn">Send</button>
                </form>
            </div>
        </body>
        <script>
            $(document).ready(()=>{
                function getData(){
                    $.ajax({
                        type: 'POST',
                        url: 'fetchmessages.php',
                        data:{userId:<?=$userId?>,toUserId:<?=$toUserId?>},
                        success: function(data){
                            $('#msgs').html(data);
                        }
                    });
                }
                getData();
                setInterval(function () {
                    getData(); 
                }, 1000);
                $("#messageForm").submit((e)=>{
                    e.preventDefault();
                    const params = {
                        toUserId: $('#toUserId').val(),
                        message: $('#message').val()
                    }
                    if(params.toUserId && params.message){
                        $.ajax({
                    url:"http://localhost/chats/send.php",
                        type:"POST",
                        data: params,
                        success:(e)=>{
                            console.log(e)
                            $("#messageForm")[0].reset();
                        }
                    })
                    }

                })
            })
        </script>
        </html>
        <?php
    }else{
        header('Location:http://localhost/chats/index.php');    
    }
}else{
    header('Location:http://localhost/chats/signin.php');
}

?>