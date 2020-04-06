<?php
	require_once '../config/koneksi.php';
	if(ISSET($_POST['add_form'])){
		$room_no = $_POST['room_no'];
		$days = $_POST['days'];
		$query = mysqli_query($koneksi, "SELECT * FROM `transaction` WHERE `room_no` = '$room_no' && `status` = 'Check In'");
		$row = mysqli_num_rows($query);
		$time = date("H:i:s", strtotime("+8 HOURS"));
		if($row > 0){
			echo "<script>alert('Room Sudah di pakai')</script>";
		}else{
			$query2 = mysqli_query($koneksi, "SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'");
			$fetch2 = mysqli_fetch_array($query2);
			$total = $fetch2['price'] * $days;
			$total3 = $total;
			$checkout = date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
			mysqli_query($koneksi, "UPDATE `transaction` SET `room_no` = '$room_no', `days` = '$days', `status` = 'Check In', `checkin_time` = '$time', `checkout` = '$checkout', `bill` = '$total3' WHERE `transaction_id` = '$_REQUEST[transaction_id]'");
			header("location:checkin.php");
		}
	}
?>