<?php
require_once("includes/BrandsManager.php");
require_once("includes/view.php");
$aAllBrands = BrandsManager::getAllBrands();

?>

		<div id="navbar">
				<li class="nav"><a href="Home.php"><i class="fa fa-home fa-fw fa-3x"></i></a></li>
				<?php echo View::renderNav($aAllBrands);?>

				<li><a href="">My Order</a></li>
				<li><a href="mydet.php">My Details</a><i class="fa fa-cog fa-spin  fa-3x"></i></li>
				<li><a href="shopingcart.php">Shoping Cart</a><i class="fa fa-cog fa-spin  fa-3x"></i></li>
				<li><a href="registration_form.php">register</a><i class="fa fa-cog fa-spin  fa-3x"></i></li>
				

				<?php  
				if (isset($_SESSION["CustomerID"]) == false) {
 					echo '<li><a href="login.php">Login/Register</a></li>';	
 				}else{
 					echo '<li><a href="logout.php">Log out</a></li>';
				}
			?>	
				
		</div>
		
		<div id="footer"></div>

	</div>
	
</body>
</html>