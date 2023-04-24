<?php

@include 'connect.php';

if(isset($_POST['submit'])){
    $name = ($_POST['username']);
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$name' && password = '$password'");

    //login
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        //cek usertype
        if($row["type"] == 0){
        header("Location: user.html");
        }

        if($row["type"] == 1){
        header("Location: admin.html");
        }
    } else {
        $error[] = 'This user is not registered.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>

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
                                <h2>Welcome Back!</h2>
                                <h6>Not registred yet?</h6>
                                <a href="register.php" class="toggle">Register</a>
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
                                    <input type="password" class="input-field pass" autocomplete="off" placeholder="Password" name="password" required onclick="toggle()">
                                    <span class="show-hide">
                                        <i class="fa fa-eye eye"></i>
                                    </span>
                                </div>
              
                                <input type="submit" value="Log In" name="submit" class="sign-btn">

                                <p class="text">
                                    Forgotten your password?
                                    <a href="#">Get help</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    
                    <div class="carousel">
                        <div class="images-wrapper">
                            <img src="assets/img/home-sushi-rolls.png" alt="home-sushi-rolls">
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- link js -->
        <script src="assets/js/script.js"></script>
    </body>
</html>