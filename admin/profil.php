<?php
	session_start();
	if ($_SESSION['level'] == '') {
		header("location:../login.php?pesan=belumlogin");
	} elseif ($_SESSION['level'] == 'guest') {
		header("location:../login.php?pesan=lainlevel");
	} elseif ($_SESSION['level'] == 'guest') {
		header("location:../login.php?pesan=lainlevel");
	}
?>
<?php
include '../config/koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script src="../jquery/jquery-3.3.1.slim.min.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>
    <title>Hotel Stuttgart</title>
</head>
<body id="admin">
    <div class="wrapper">
        <div class="bar-kiri">
            <h2>Menu</h2>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="reserve.php">Data Checkin</a></li>
                <li><a href="room.php">Room Hotel</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header-main-content">
                Your Account Profile
            </div>
            <div class="info">
                <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$_SESSION[username]'");
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                <div class="info-profil">
                    <img src="../img/up.jpg">
                    <h3><?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo "Happy ";
                    echo date('l, d-m-Y  h:i:s a');
                    ?></h3>
                    <h3>Nama : <?= $d['nama']; ?></h3>
                    <h3>Username : <?= $d['username']; ?></h3>
                    <h3>Password : <?= $d['password']; ?></h3>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>