<?php 
session_start();
include "dbcon.php";
if($_SESSION['USER']){
    $userId = $_POST['userId'];
    $toUserId = $_POST['toUserId'];
    $chatHistorySql = "SELECT * FROM messages WHERE (senderId ='$userId' and receverId='$toUserId') or (senderId ='$toUserId' and receverId='$userId') ORDER BY date ASC";
    $chatQuery = mysqli_query($conn,$chatHistorySql);
    $chatrows = mysqli_num_rows($chatQuery);
    if($chatrows == 0){
?>
    <p class="text-center">start a new conversation</p>
    <?php 
    }else{
        while($row = mysqli_fetch_assoc($chatQuery)){
            $date = $row['date'];
 $date = strtotime($date);

            if($row['senderId'] == $userId){
            ?>
            
            <p class="text-right text-primary" style="font-size:1.6rem"><span style="font-size:1rem;"><?= date('h:i A', $date)?></span> <?= $row['message']?>  </p>
            
            <?php
            }else{
                ?>
            <p class="text-left text-danger" style="font-size:1.6rem"><?= $row['message']?>  <span style="font-size:1rem;"><?= date('h:i A', $date)?></span></p>

                <?php
            }
        }
    }
}