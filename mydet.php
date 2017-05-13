<?php 
session_start();

if (isset($_SESSION["CustomerID"]) == false) {
	header("Location:login.php");
}

require_once("includes/header.php");
require_once("includes/customer.php");
require_once("includes/view.php");


$oCustomer = new Customer();
$oCustomer->load($_SESSION["CustomerID"]); 

?>
		<div id="mainpage">

			<?php echo View::renderCustomer($oCustomer);?>
			<li class="edit"><a class="btn btn-danger" href="edit_details.php">
  				<i class="fa fa-refresh fa-spin"></i>edit</a></li><!--  "edit_details.php" -->

			<!-- <div id="mydetails">
			LastName<br>
			Address<br>
			Telephone<br>
			Email<br>
			User Name<br>
			Password<br>
			Confirm Password<br>
			Credit
			FirstName<br>
			</div> -->
			
			
		</div>

<?php 
require_once("includes/footer.php");
 ?>