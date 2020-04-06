<?php
	require_once '../config/koneksi.php';
	mysqli_query($koneksi, "DELETE FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'");
	header("location:room.php");
?>