<?php 
require_once("includes/cart.php");


session_start();

$oCart = $_SESSION["cart"];

$iProductID = $_GET["ProductID"];
$oCart->remove($iProductID);

header("Location:shopingcart.php");



 ?>