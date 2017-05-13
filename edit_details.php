<?php 
session_start();
require_once("includes/form.php");
require_once("includes/header.php");
require_once("includes/customer.php");

$oCustomer = new Customer();
$oCustomer->load($_SESSION["CustomerID"]);


$aExistingData = array();
$aExistingData["first_name"] = $oCustomer->firstName;
$aExistingData["last_name"] = $oCustomer->lastName;
$aExistingData["address"] = $oCustomer->address;
$aExistingData["telephone"] = $oCustomer->telephone;
$aExistingData["email"] = $oCustomer->email;
$aExistingData["credit"] = $oCustomer->credit;


$oForm = new Form();
$oForm->data = $aExistingData;

if (isset($_POST["submit"])) {
	$oForm->data = $_POST;
		
		$oForm->checkFilled("first_name");
		$oForm->checkFilled("last_name");
		$oForm->checkFilled("address");
		$oForm->checkFilled("telephone");
		$oForm->checkFilled("email");
		$oForm->checkFilled("credit");
	
			if ($oForm->valid == true) {
				$oCustomer->firstName= $_POST["first_name"];
				$oCustomer->lastName = $_POST["last_name"];
				$oCustomer->address = $_POST["address"];
				$oCustomer->telephone = $_POST["telephone"]; 
				$oCustomer->email = $_POST["email"];
				$oCustomer->credit = $_POST["credit"];

			$oCustomer->save();

			header("Location:mydet.php");
			exit;
		}	
	}

$oForm->makeInput("first_name","First Name");
$oForm->makeInput("last_name","LastName");
$oForm->makeInput("address","Address");
$oForm->makeInput("telephone","Telephone");
$oForm->makeInput("email","Email");
$oForm->makeInput("credit","credit");
$oForm->makeSubmit("submit","update");
 

 echo $oForm->HTML;

require_once("includes/footer.php");

 ?>