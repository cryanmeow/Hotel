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
		<div class="main-content">
				<div class="header-main-content">
				<div>Room</div>
				<a href = "add_room.php">Add Room</a>
				</div>
				<div class="info">
				<table id = "table" cellspacing="25"style="text-align:center;">
						<tr>
							<th>Room Type</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					<?php
						$query = mysqli_query($koneksi, "SELECT * FROM `room`");
						while($fetch = mysqli_fetch_array($query)){
					?>	
						<tr>
							<td><?php echo $fetch['room_type']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><img src = "../img/<?php echo $fetch['photo']?>" height = "100" width = "100"/></td>
							<td><a href = "edit_room.php?room_id=<?php echo $fetch['room_id']?>">Edit</a>
								<a href = "delete_room.php?room_id=<?php echo $fetch['room_id']?>">Delete</a></td>
						</tr>
					<?php
						}
					?>
			</div>
		</div>
	</div>
</body>
</html>