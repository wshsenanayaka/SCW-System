<!-- check  the login user correct -->
<?php
    session_start();
    require '../include/config.php';
    $user= $_SESSION['user_name'];
    if(!isset($_SESSION['user_name'])){
    header('Location: ../index.php');
    }
?>
