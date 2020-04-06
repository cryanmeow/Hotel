<?php
	require_once '../config/koneksi.php';
	if(ISSET($_POST['edit_room'])){
		$room_type = $_POST['room_type'];
		$price = $_POST['price'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		mysqli_query($koneksi, "UPDATE `room` SET `room_type` = '$room_type', `price` = '$price', `photo` = '$photo_name' WHERE `room_id` = '$_REQUEST[room_id]'");
		header("location:room.php");
	}
?>