<?php
	require_once '../config/koneksi.php';
	$time = date("H:i:s", strtotime("+8 HOURS"));
	mysqli_query($koneksi, "UPDATE `transaction` SET `checkout_time` = '$time', `status` = 'Check Out' WHERE `transaction_id` = '$_REQUEST[transaction_id]'");
	header("location:checkout.php");
?>