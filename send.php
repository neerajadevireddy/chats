<?php
session_start();

include "dbcon.php";

if($_SESSION['USERID']){
    if(isset($_POST)){
        $message = $_POST['message'];
        $toUserId = $_POST['toUserId'];
        $formId = $_SESSION['USERID'];
        echo $message;
        echo $toUserId;
        $sql = "INSERT INTO messages (senderId,receverId,message) VALUES ('$formId','$toUserId','$message')";
        $res = mysqli_query($conn, $sql);
        if($res){
            echo "success";
        }else{
            echo mysqli_error($conn);
        }
    }
}