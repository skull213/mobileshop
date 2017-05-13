<?php
session_start();
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/cart.php");

		
$oForm = new Form();			

if(isset($_POST["submit"])){
	$oForm->data = $_POST;

$oForm->checkFilled("user_name");
$oForm->checkFilled("password");




	if ($oForm->valid == true) {
		//check for usernaeme
		$oTestCustomer = new Customer();
		$bSuccsses = $oTestCustomer->loadByUserName($_POST["user_name"]);

		if ($bSuccsses == false) {
		    $oForm->raiseCustomError("user_name", "wrong user name");
		}else{

			if ($oTestCustomer->password != $_POST["password"]) {
				$oForm->raiseCustomError("password","wrong password");
		
			}else{
				$_SESSION["CustomerID"] = $oTestCustomer->customerID; //the customer id id from get function // the 'id' of the person who logs in

				$oCart = new Cart();
				$_SESSION["cart"] = $oCart;

				header("Location:mydet.php");
				exit;
			}
		
		}

	}

}


$oForm->makeInput("user_name","User Name");
$oForm->makePassword("password","Password");
$oForm->makeSubmit("submit","submit");



 ?>

<div id="mainpage">
<?php echo $oForm->HTML;?>	
</div>

<?php 
require_once("includes/footer.php");
 ?>