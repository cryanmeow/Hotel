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
<html lang = "en">
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
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="reserve.php">Data Checkin</a></li>
                <li><a href="">Room Hotel</a></li>
            </ul>
		</div>
		<div class="main-content">
				<div class="header-main-content">
					<h4>Confirm Checkin</h4>
				</div>
				<?php
					$query = mysqli_query($koneksi, "SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'");
					$fetch = mysqli_fetch_array($query);
				?>		
				<div class="info">		
				<form method = "POST" enctype = "multipart/form-data" action = "save_form.php?transaction_id=<?php echo $fetch['transaction_id']?>">
					<div>
						<label>Firstname</label>
						<input type = "text" value = "<?php echo $fetch['firstname']?>" class = "form-input" size = "40" disabled = "disabled"/>
					</div>
					<div>
						<label>Lastname</label>
						<input type = "text" value = "<?php echo $fetch['lastname']?>" class = "form-input" size = "40" disabled = "disabled"/>
					</div>
					<div class = "form-inline">
						<label>Room Type</label>
						<input type = "text" value = "<?php echo $fetch['room_type']?>" class = "form-input" size = "20" disabled = "disabled"/>
					</div>
					<div class = "form-inline">
						<label>Room No</label>
						<input type = "number" min = "0" max = "999" name = "room_no" class = "form-input" required = "required"/>
					</div>
					<div class = "form-inline">
						<label>Days</label>
						<input type = "number" min = "0" max = "99" name = "days" class = "form-input" required = "required"/>
					</div>
					<button name = "add_form" class = "my-btn-admin">Submit</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>