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
				</div>
				<div class="info">	
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Room Type </label>
							<select class = "form-input" required = required name = "room_type">
								<option value = "Standard">Standard</option>
								<option value = "Superior">Superior</option>
								<option value = "Super Duper">Super Duper</option>
								<option value = "Sooltan">Sooltan</option>
								<option value = "Executive Suite">Executive Suite</option>
							</select>
						</div>
						<div class = "form-group">
							<label>Price </label>
							<input type = "number" min = "0" max = "999999999" class = "form-input" name = "price" />
						</div>
						<div class = "form-group">
							<label>Photo </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<center id = "lbl">[Photo]</center>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</div>
						<div class = "form-group">
							<button name = "add_room" class = "my-btn-admin">Saved</button>
						</div>
					</form>
					<?php require_once 'add_query_room.php'?>
				</div>
			</div>
		</div>
	</div>
</body>
<script src = "../jquery/jquery-3.3.1.slim.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>