<?php
	require_once 'config/koneksi.php';
	if(ISSET($_POST['add_guest'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		$checkin = $_POST['date'];
		mysqli_query($koneksi, "INSERT INTO `guest` (firstname, lastname, address, contactno) VALUES('$firstname', '$lastname', '$address', '$contactno')");
		$query = mysqli_query($koneksi, "SELECT * FROM `guest` WHERE `firstname` = '$firstname' && `lastname` = '$lastname' && `contactno` = '$contactno'");
		$fetch = mysqli_fetch_array($query);
		$query2 = mysqli_query($koneksi, "SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$_REQUEST[room_id]' && `status` = 'Pending'");
		$row = mysqli_num_rows($query2);
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Not Available Date</label><br />";
							$q_date = mysqli_query($koneksi, "SELECT * FROM `transaction` WHERE `status` = 'Pending'");
							while($f_date = mysqli_fetch_array($q_date)){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							mysqli_query($koneksi, "INSERT INTO `transaction`(guest_id, room_id, status, checkin) VALUES('$guest_id', '$room_id', 'Pending', '$checkin')");
							header("location:reply_reserve.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	}	
?>