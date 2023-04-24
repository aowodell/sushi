<?php

@include 'connect.php';

$id = $_GET['edit'];

if(isset($_POST['update_user'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if(empty($name) || empty($email) || empty)
}

?>kjk