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
					<a class = "" href = "reserve.php"><?php echo $f_p['total']?> Pendings</a>
					<a class = "" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
					<a class = "" href = "checkout.php">Check Out</a>
				</div>
				<div class="info">
				<table id = "table" cellspacing="25"style="text-align:center;">
						<tr>
							<td>Name</td>
							<td>Room Type</td>
							<td>Room no</td>
							<td>Check In</td>
							<td>Days</td>
							<td>Check Out</td>
							<td>Status</td>
							<td>Bill</td>
							<td>Checked</td>
						</tr>
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check Out'");
							while($fetch = mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['room_type']?></td>
							<td><?php echo $fetch['room_no']?></td>
							<td><?php echo date("M d, Y", strtotime($fetch['checkin']))." @ "."<label>".date("h:i a", strtotime($fetch['checkin_time']))."</label>"?></td>
							<td><?php echo $fetch['days']?></td>
							<td><?php echo date("M d, Y", strtotime($fetch['checkin']."+".$fetch['days']."DAYS"))."</label>"." @ "."<label>".date("h:i A", strtotime($fetch['checkout_time']))."</label>"?></td>
							<td><?php echo $fetch['status']?></td>						
							<td><?php echo $fetch['bill'].".00"?></td>
							<td><label class = "">Sudah Checkout</label></td>
						</tr>
						<?php
							}
						?>
				</table>
			</div>
		</div>
</body>
</html>