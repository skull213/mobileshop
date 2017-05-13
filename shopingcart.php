<?php 
require_once("includes/cart.php");
session_start();
require_once("includes/products.php");
require_once("includes/view.php");
require_once("includes/header.php");

// $oCart = new Cart();
// $oCart->add(1);
// $oCart->add(2);
// $oCart->add(2);

if (isset($_SESSION["cart"]) == false) {
	header("Location:login.php");
}

$oCart = $_SESSION["cart"] ;

echo View::renderCart($oCart); 
require_once("includes/footer.php");
 ?>

<?php 
require_once("includes/footer.php");
 ?>