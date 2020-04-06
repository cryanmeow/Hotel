<?php
session_start();
include 'koneksi.php';
$code_user = "";
$nama = "";
$username = "";
$password = "";
function random($digit)
{
    $karakter = '1234567890';
    $string = '';
    for ($i = 0; $i < $digit; $i++) {
        $post = rand(0, strlen($karakter) - 1);
        $string .= $karakter{
            $post};
    };
    return $string;
}
$random = random(8);
if (isset($_POST['reg_user'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    if (count($errors) == 0) {
        mysqli_query($koneksi, "INSERT INTO tbl_user (nama, username, password, level) VALUES ('$nama','$username','$password','guest')");
        $_SESSION['username'] = $username;
        header("Location:../index2.php");
    }
}
