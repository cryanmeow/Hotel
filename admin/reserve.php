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
                <li><a href="home.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="checkin.php">Data Checkin</a></li>
                <li><a href="room.php">Room Hotel</a></li>
            </ul>
        </div>
			<?php
				$q_p = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'");
				$f_p = mysqli_fetch_array($q_p);
				$q_ci = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'");
				$f_ci = mysqli_fetch_array($q_ci);
			?>
			<div class="main-content">
				<div class="header-main-content">
					<a class = ""><?php echo $f_p['total']?> Pendings</a>
					<a class = "" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
					<a class = "" href = "checkout.php">Check Out</a>
				</div>
				<div class="info">
				<table id = "table" cellspacing="25"style="text-align:center;">
						<tr>
							<td>Name</td>
							<td>Contact No</td>
							<td>Room Type</td>
							<td>Reserved Date</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Pending'") or die(mysqli_error());
							while($fetch = mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['contactno']?></td>
							<td><?php echo $fetch['room_type']?></td>
							<td><strong><?php echo $fetch['checkin'] ?></strong></td>
							<td><?php echo $fetch['status']?></td>
							<td><a class = "btn btn-success" href = "confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id']?>"><i class = "glyphicon glyphicon-check"></i> Check In</a> <a class = "btn btn-danger" onclick = "confirmationDelete(); return false;" href = "delete_pending.php?transaction_id=<?php echo $fetch['transaction_id']?>">Delete</a></td>
						</tr>
						<?php
							}
						?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>