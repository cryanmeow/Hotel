<?php
include 'config/signup_proses.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="jquery/jquery-3.3.1.slim.min.js"></script>
    <script defer src="fontawesome/js/all.js"></script>
    <title>Hotel Stuttgart</title>
</head>
<body>
<body id="login_oop">
<div class="login-form">
        <h2>Stuttgart Login</h2>
        <?php
        include 'config/errors.php';
        ?>
        <form action="config/signup_proses.php" method="post" class="form-check">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <input type="username" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button class="sign-btn" name="reg_user">SignUp</button>
            </form>
    </div>
</body>
</html>