<?php 
	session_start();
	require_once 'Connect/connect.php';
	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$query = "SELECT * FROM products WHERE products.id = '".$id."'";
	$rs = $conn->query($query)->fetch_assoc();

	if($rs){

		if(isset($_SESSION['cart'][$id])){


			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]['sl']+=1;
			}else{
				$_SESSION['cart'][$id]['sl']=1;
			}
			$_SESSION['cart'][$id]['id']=$rs['id'];
			$_SESSION['cart'][$id]['name']=$rs['pro_name'];
			$_SESSION['cart'][$id]['view']=$rs['pro_view'];
			$_SESSION['cart'][$id]['price']=$rs['pro_price'];
			header("Location: product_detail.php?id=$id");
			setcookie('msg',"Đã thêm vào giỏ hàng thành công !",time()+2);exit();

		}else{
			$_SESSION['cart'][$id]['id']=$rs['id'];
			$_SESSION['cart'][$id]['name']=$rs['pro_name'];
			$_SESSION['cart'][$id]['view']=$rs['pro_view'];
			$_SESSION['cart'][$id]['price']=$rs['pro_price'];
			$_SESSION['cart'][$id]['sl']=1;
			header("Location: product_detail.php?id=$id");
			setcookie('msg',"Đã thêm vào giỏ hàng thành công !",time()+2);exit();
			}
	}else{
		$_SESSION['msg'] = "Không tồn tại sản phẩm !";
		header("Location: products.php");exit();
	}	
?>