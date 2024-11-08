<?php
session_start();
include 'config.php';
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

	$cek_admin = mysqli_query ($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password' AND level='admin'");
    $cek_user = mysqli_query($mysqli, "SELECT*FROM users WHERE username='$username'AND password='$password'AND level='user'");
    if (mysqli_num_rows($cek_admin) > 0){
        $_SESSION['users'] =mysqli_fetch_array($cek_admin);
        header ("location:admin/index.php");
    
    }elseif (mysqli_num_rows($cek_user) > 0){
		$_SESSION['users'] =mysqli_fetch_array($cek_user);
		header ("location:user/index.php");

	} else {
		echo 
        '<script>
            alert("Username / Password Salah!!");
            location.href="index.php";
        </script>';
        
	}

}
?>