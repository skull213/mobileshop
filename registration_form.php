<?php 

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");



$oForm = new Form();

if(isset($_POST["submit"])){
	$oForm->data = $_POST;

$oForm->checkFilled("first_name");
$oForm->checkFilled("last_name");
$oForm->checkFilled("telephone");
$oForm->checkFilled("email");
$oForm->checkFilled("user_name");
$oForm->checkFilled("password");
$oForm->checkFilled("confirm_password");
$oForm->checkFilled("credit");
$oForm->checkSame("password","confirm_password");

$oTestCustomer = new Customer();
$bSuccess = $oTestCustomer->loadByUserName($_POST["user_name"]);
if ($bSuccess == true) {
	$oForm->raiseCustomError("user_name", "already taken");
}

if ($oForm->valid == true) {
	
	$oCustomer = new Customer();

	$oCustomer->firstName = $_POST["first_name"];
	$oCustomer->lastName = $_POST["last_name"];
	$oCustomer->address = $_POST["address"];
	$oCustomer->telephone = $_POST["telephone"];
	$oCustomer->email = $_POST["email"];
	$oCustomer->userName = $_POST["user_name"];
	$oCustomer->password = $_POST["password"];
	$oCustomer->credit = $_POST["credit"];

	$oCustomer->save();

	}


}//if statement			


$oForm->makeInput("first_name","First Name");
$oForm->makeInput("last_name","LastName");
$oForm->makeInput("address","Address");
$oForm->makeInput("telephone","Telephone");
$oForm->makeInput("email","Email");
$oForm->makeInput("user_name","User Name");
$oForm->makePassword("password","Password");
$oForm->makePassword("confirm_password","Confirm Password");
$oForm->makeInput("credit","credit");
$oForm->makeSubmit("submit","register");

 ?>
		<div id="mainpage">
		<?php echo $oForm->HTML;?>
		</div>
		<?php 
require_once("includes/footer.php");
 ?>