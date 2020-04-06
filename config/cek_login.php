<?php
session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi,"select * from tbl_user where username= '$username' and password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	if($data['level']=="guest"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guest";
		header("Location:../index2.php");
	} else if($data['level'] == "admin"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("Location:../admin/home.php");
	} else{
		header("Location:../login.php?pesan=gagal");
	} 
}else{
		header("Location:../login.php?pesan=gagal");
	}
?>

