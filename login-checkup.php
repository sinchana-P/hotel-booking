<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<div>Please login to access our web page.</div>";
        header('location:' . SITEURL . 'login.php');
    }
?>

