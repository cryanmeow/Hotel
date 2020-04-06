<?php
	require_once '../config/koneksi.php';
	mysqli_query($koneksi, "DELETE FROM `transaction` WHERE `transaction_id` = '$_REQUEST[transaction_id]'");
	header("location:reserve.php");
?>