<?php 
$u = trim($_POST['user']);
$p = trim($_POST['pass']);



if($u == 'nam' && $p == 'nam'){
	echo "Dang nhap thanh cong";
	header('Location: index.php');
	
}
 ?>