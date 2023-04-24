<?php

    @include 'connect.php, register.php';

    if(isset($_POST['edit_user'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>

        <!-- link bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- link font awesome -->
        <script src="https://kit.fontawesome.com/fa54062129.js" crossorigin="anonymous"></script>

        <!-- link css -->
        <link rel="stylesheet" href="assets/css/user.css">

        <!-- page icon -->
        <link rel="icon" href="assets/img/cat-sushi-logo.png">
    </head>

    <body>
        <main>
            <div class="user-display">
                <table class="user-display-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php while($row = mysqli_fetch_assoc($select)){ ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>
                                <a href="user-update.php?edit=<?php echo $row['id']; ?>" class="btn"><i class="fas fa-edit"></i></a>
                                <a href="user-update.php?delete=<?php echo $row['id']; ?>" class="btn"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </main> 
    </body>
</html>