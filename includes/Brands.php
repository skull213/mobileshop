<?php 
require_once("connection.php");
require_once("Products.php");
class Brands {

	private $iBrandID;
	private $sBrandName;
	private $sDescription;
	private $iDisplayOrder;
	private $aProducts;

	public function __construct(){

		$this->iBrandID = 0;
		$this->sBrandName = "";
		$this->sDescription = "";
		$this->iDisplayOrder = 0;
		$this->aProducts = array();
	}

	public function load($iBrandID){

		$connection = new connection();
		$sQuery = "SELECT BrandID, BrandName, Description, DisplayOrder
		FROM tbproductbrand
		WHERE BrandID = " .$iBrandID;

		$resultset = $connection->query($sQuery);

		$row = $connection->fetch_array($resultset);

		$this->iBrandID = $row["BrandID"];
		$this->sBrandName = $row["BrandName"];
		$this->sDescription = $row["Description"];
		$this->iDisplayOrder = $row["DisplayOrder"];

		$sSQL = "SELECT ProductID FROM tbproduct WHERE BrandID = ".$iBrandID;
		$resultset = $connection->query($sSQL);

		while ($row = $connection->fetch_array($resultset)) {
			$iProductID = $row["ProductID"];
			$oProducts = new Products();	//conect products page to brands page
			$oProducts->load($iProductID);
			$this->aProducts[] = $oProducts;

		}

		$connection->close_connection();

	}

	public function save(){}

	public function __get($sKey){
		

		switch ($sKey) {
    case "BrandID":
        return $this->iBrandID;
        break;
    case "BrandName":
        return $this->sBrandName;
        break;
    case "Description":
        return $this->sDescription;
        break;
    case "DisplayOrder":
        return $this->iDisplayOrder;
        break;
    case "products":
        return $this->aProducts;
        break;                
    default:
     	die ($sKey . "does not exist");
		
		}//switch

	}//function

}//end of class

//test
// $oBrands1 = new Brands();
// $oBrands1->load(2);



// echo "<pre>";
// print_r($oBrands1);
// echo "</pre>";
 ?>
