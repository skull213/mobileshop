<?php
session_start(); 
require_once("includes/header.php");
require_once("includes/view.php");
require_once("includes/Brands.php");

 $iBrandID =1;

if (isset($_GET["BrandID"])) {
	$iBrandID = $_GET["BrandID"];
}


$oBrand = new Brands();
$oBrand->load($iBrandID);

?>


		<div id="mainpage">
 
			<?php 
			echo View::renderBrand($oBrand);
			?>
			<!-- <h1>Samsung</h1>
				<div id="img1" class="pics">
					<div class="info">
						<h1>Samsung Galaxy S6 Edge</h1>
						<p>THE GOOD / The Samsung Galaxy S6 Edge's wraparound screen transforms an already great phone into Samsung's best-looking handset. Ever.</p>
						<span>$999</span>
						<button>ADD TO CART</button>
					</div>
					
				</div>
				<div id="img2" class="pics">

					<div class="info">
					<h1>Samsung Galaxy S6</h1>
					<p>THE GOOD / The Samsung Galaxy S6 Edge's wraparound screen transforms an already great phone into Samsung's best-looking handset. Ever.</p>
					<span>$999</span>
					<button>ADD TO CART</button>
					</div>
				</div>
				<div id="img3" class="pics">
					<div class="info">
					<h1>Samsung Galaxy S6</h1>
					<p>THE GOOD / The Samsung Galaxy S6 Edge's wraparound screen transforms an already great phone into Samsung's best-looking handset. Ever.</p>
					<span>$999</span>
					<button>ADD TO CART</button>
					</div>
				</div>
				<div id="img4" class="pics"><div class="info">
					<h1>Samsung Galaxy S6</h1>
					<p>THE GOOD / The Samsung Galaxy S6 Edge's wraparound screen transforms an already great phone into Samsung's best-looking handset. Ever.</p>
					<span>$999</span>
					<button>ADD TO CART</button>
					</div>
				</div>-->
		</div>

<?php 
require_once("includes/footer.php");
 ?>