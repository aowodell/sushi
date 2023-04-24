<?php

@include 'connect.php';

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $error[] = 'This user already exists.';

    }else {
        if($pass != $cpass) {
            $error[] = 'Password not matched.';
        } else {
            $insert = "INSERT INTO users(username, email, password, type, code, status) VALUES('$name','$email','$pass',0,0,1)";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <!-- link font awesome -->
        <script src="https://kit.fontawesome.com/fa54062129.js" crossorigin="anonymous"></script>

        <!-- link css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- page icon -->
        <link rel="icon" href="assets/img/cat-sushi-logo.png">
    </head>

    <body>
        <main>
            <div class="box">
                <div class="inner-box">
                    <div class="forms-wrap">
                        <!-- login -->
                        <form action="" autocomplete="on" class="sign-in-form" method="POST">
                            <div class="heading">
                                <h4>NEKOSHI ฅ^•ﻌ•^ฅ</h4>
                                <h2>Hi, New User!</h2>
                                <h6>Already have an account?</h6>
                                <a href="login.php" class="toggle">Login</a>
                            </div>

                            <?php
                                if(isset($error)) {
                                    foreach($error as $error) {
                                        echo '<span class="error-msg">' .$error. '</span>';
                                    }
                                }
                            ?>
              
                            <div class="actual-form">
                                <div class="input-wrap">
                                    <input type="text" minlength="4" class="input-field" autocomplete="off" placeholder="Username" name="username" required>
                                </div>

                                <div class="input-wrap">
                                    <input type="email" minlength="4" class="input-field" autocomplete="off" placeholder="Email" name="email" required>
                                </div>
              
                                <div class="input-wrap">
                                    <input type="password" class="input-field pass" autocomplete="off" placeholder="Password" name="password" required onclick="toggle()">
                                    <span class="show-hide">
                                        <i class="fa fa-eye eye"></i>
                                    </span>
                                </div>

                                <div class="input-wrap">
                                    <input type="password" class="input-field pass" autocomplete="off" placeholder="Confirm Password" name="cpassword" required onclick="toggle()">
                                    <span class="show-hide">
                                        <i class="fa fa-eye eye"></i>
                                    </span>
                                </div>
              
                                <input type="submit" value="Register" name="submit" class="sign-btn">
                            </div>
                        </form>
                    </div>
                    
                    <div class="carousel">
                        <div class="images-wrapper">
                            <img src="assets/img/recently-salmon-sushi.png" alt="home-sushi-rolls">
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- link js -->
        <script src="assets/js/app.js"></script>
    </body>
</html>