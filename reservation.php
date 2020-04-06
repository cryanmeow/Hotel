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
<body id="book">
				<?php
					require_once 'config/koneksi.php';
					$query = mysqli_query($koneksi, "SELECT * FROM `room` ORDER BY `price` ASC");
					while($fetch = mysqli_fetch_array($query)){
				?>
					<div id="bbox">
						<div class="kiri">
							<img src="img/<?php echo $fetch['photo']?>" height = "250" width = "350">
							<h3><?php echo $fetch['room_type']?></h3>
							<p><?php echo "Price: ".$fetch['price'].".00"?></p>
						</div>
						<div class="kanan">
							<a href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>">BOOK NOW</a>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>