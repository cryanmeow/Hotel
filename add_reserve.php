<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="build10-512.png" type="image/x-icon">
    <script src="jquery/jquery-3.3.1.slim.min.js"></script>
    <script defer src="fontawesome/js/all.js"></script>
    <title>Hotel Stuttgart</title>
</head>
<body id="booking">
<div class="coco">
    <h1>Silahkan Isi Data</h1>
    <div class="form">
				<?php 
					require_once 'config/koneksi.php';
					$query = mysqli_query($koneksi, "SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'");
					$fetch = mysqli_fetch_array($query);
				?>
				<img src="img/<?php echo $fetch['photo'];?>">
				<h3><?php echo $fetch['room_type']?></h3>
				<h3><?php echo "Price: ".$fetch['price'].".00"?></h3>
				<div>
					<form method = "POST" enctype = "multipart/form-data">
					<table border="0">
						<div class="form-group">
						<tr>
							<td>Firstname</td>
							<td><input type="text" name="firstname" class="form-input"></td>
						</tr>
						</div>
						<div class="form-group">
						<tr>
							<td>Lastname</td>
							<td><input type="text" name="lastname" class="form-input"></td>
						</tr>
						</div>
						<div class="form-group">
						<tr>
							<td>Adresse</td>
							<td><input type="text" name="address" class="form-input"></td>
						</tr>
						</div>
						<div class="form-group">
						<tr>
							<td>Contact No</td>
							<td><input type="number" name="contactno" class="form-input"></td>
						</tr>
						</div>
						</div>
						<div class="form-group">
						<tr>
							<td>Check in</td>
							<td><input type="date" name="date" class="form-input"></td>
						</tr>
						</div>
					</table>
						<div class = "form-group">
							<button class = "my-btn" name = "add_guest">Submit</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>