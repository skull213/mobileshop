<?php 
require_once("includes/cart.php");


session_start();

if ($_SESSION["cart"] == false) {
	header("Location:login.php");
}else{
	$oCart = $_SESSION["cart"];

$iProductID = $_GET["ProductID"];
$oCart->add($iProductID);

header("Location:shopingcart.php");
}

?>