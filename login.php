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
<body id="login_oop">
<div class="login-form">
        <h2>Stuttgart Login</h2>
        <form action="config/cek_login.php" method="post" class="form-check">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button class="sign-btn">Login</button>
            <?php
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
			echo "Login gagal, Username atau Password salah";
		} else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		} else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman profil";
		}
		}
		?>
        </form>
    </div>
</body>
</html>