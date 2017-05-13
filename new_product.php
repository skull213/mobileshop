<?php 
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/Products.php");
require_once("includes/customer.php");
session_start();

if (isset($_SESSION["CustomerID"])== false) {
	header("Location:login.php");
	exit;
}

$oTestCustomer = new Customer();
$oTestCustomer->load($_SESSION["CustomerID"]);

if ($oTestCustomer->admin != 1) {
	header("Location:login.php");
	exit;
}

$oForm = new Form();

if (isset($_POST["submit"])) {
	
	$oForm->data = $_POST;
	$oForm->files = $_FILES;

$oForm->checkFilled("product_name");
$oForm->checkFilled("description");
$oForm->checkFilled("price");
$oForm->checkFilled("brand_ID");
$oForm->checkFilled("stock_level");
$oForm->checkFileUploaded("photo_path");
$oForm->checkFilled("active");

if ($oForm->valid == true) {
	//if the form is valid create new product
	$oProducts = new Products();

	$date = new DateTime();

	$sImageName = "bla".date_timestamp_get($date).".jpg"; //image renaming from server

	// $sImageName = "bla.jpg";

	$oForm->moveFile("photo_path",$sImageName);

	$oProducts->ProductName = $_POST["product_name"];
	$oProducts->Description = $_POST["description"];
	$oProducts->Price = $_POST["price"];
	$oProducts->BrandID = $_POST["brand_ID"];
	$oProducts->StockLevel = $_POST["stock_level"];
	$oProducts->PhotoPath = $sImageName;
	$oProducts->Active = $_POST["active"];

	$oProducts->save();

	header("Location:samsung.php?BrandID=".$oProducts->BrandID);

}

}



$oForm->makeInput("product_name","Product Name");
$oForm->makeInput("description","Description");
$oForm->makeInput("price", "Price");
$oForm->makeInput("brand_ID","BrandID");
$oForm->makeInput("stock_level","StockLevel");
$oForm->makeFileInput("photo_path","PhotoPath");
$oForm->makeInput("active","Active");
$oForm->makeSubmit("submit","add product");
?>



<div id="mainpage">
	<div id="product_form">
		<?php echo $oForm->HTML; ?>
	</div>
</div>

<?php 
require_once("includes/footer.php");
 ?>