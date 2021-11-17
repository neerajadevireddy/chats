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
 <div class="msgs" >
    <p class="text-center">start a new conversation</p>
    <?php 
    }else{
        function encrypt_decrypt($string, $action = 'encrypt')
        {
            $encrypt_method = "AES-256-CBC";
            $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
            $secret_iv = '5fgf5HJ5g27'; // user define secret key
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
            if ($action == 'encrypt') {
                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                $output = base64_encode($output);
            } else if ($action == 'decrypt') {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
            return $output;
        }
        while($row = mysqli_fetch_assoc($chatQuery)){
            $date = $row['date'];
            $date = strtotime($date);

            $message = encrypt_decrypt($row['message'],'decrypt');
            if($row['senderId'] == $userId){
            ?>
            <p class="text-right text-primary" style="font-size:1.6rem"><span style="font-size:1rem;"><?= date('h:i A', $date)?></span> <?= $message?>  </p>
            <?php
            }else{
                ?>
            <p class="text-left text-danger" style="font-size:1.6rem"><?= $message?>  <span style="font-size:1rem;"><?= date('h:i A', $date)?></span></p>
                <?php
            }
        }
        ?>
        </div>
        <?php
    }
}