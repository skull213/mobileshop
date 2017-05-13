<?php
require_once("connection.php");
class Products {

	private $iProductID;
	private $sProductName;
	private $sDescription;
	private $fPrice;
	private $iBrandID;
	private $iStockLevel;
	private $sPhotoPath;
	private $iActive;


	public function __construct(){

		$this->iProductID = 0;
		$this->sProductName = "";
		$this->sDescription = "";
		$this->fPrice = 0;
		$this->iBrandID = 0;
		$this->sPhotoPath = "";
		$this->iStockLevel = 0;
		$this->iActive = 0;

	}
	public function load ($iProductID){

		$connection = new connection();
		$sQuery = "SELECT ProductID, ProductName, Description, Price, BrandID, StockLevel, PhotoPath, Active, PhotoPath
					FROM tbproduct
					WHERE ProductID = ".$iProductID;
		
		$resultset = $connection->query($sQuery);

		$row = $connection->fetch_array($resultset);

		$this->iProductID = $row["ProductID"];
		$this->sProductName = $row["ProductName"];
		$this->sDescription = $row["Description"];
		$this->fPrice = $row["Price"];
		$this->iBrandID = $row["BrandID"];
		$this->sPhotoPath = $row["PhotoPath"];


		$connection->close_connection();

	}//load

	public function save (){

		$connection = new connection();
			
			//its just insert without loop to update insert 
			$sSQL = "INSERT INTO tbproduct (ProductName, Description, Price, BrandID, StockLevel, PhotoPath, Active) 
			VALUES ('".$this->sProductName."', '".$this->sDescription."', '".$this->fPrice."', '".$this->iBrandID."', 
				    '".$this->iStockLevel."', '".$this->sPhotoPath."', '".$this->iActive."')";
		
			$bSuccess = $connection->query($sSQL);

		if ($bSuccess == true) {
			
			$this->iProductID = $connection->get_insert_id();
		
		}else{
			
			die($sSQL . "fails");
		}
	
	}


	public function __get($sKey){

		
		switch ($sKey) {
    case "ProductID":
        return $this->iProductID;
        break;
    case "ProductName":
        return $this->sProductName;
        break;
    case "Description":
        return $this->sDescription;
        break;
    case "Price":
        return $this->fPrice;
        break;
    case "BrandID":
        return $this->iBrandID;
        break;
    case "PhotoPath":
        return $this->sPhotoPath;
        break;
    case "StockLevel":
        return $this->iStockLevel;
        break; 
    case "Active":
        return $this->iActive;
        break;                  
    default:
     	die ($sKey . "does not exist");
	}//switch


  }//get


  	public function __set($sKey,$value){
  	

  	switch ($sKey) {
    case "ProductName":
        return $this->sProductName = $value;
        break;
    case "Description":
        return $this->sDescription = $value;
        break;
    case "Price":
        return $this->fPrice = $value;
        break;
    case "BrandID":
        return $this->iBrandID = $value;
        break;
    case "PhotoPath":
        return $this->sPhotoPath = $value;
        break; 
    case "StockLevel":
        return $this->iStockLevel = $value;
        break; 
    case "Active":
        return $this->iActive = $value;
        break;   
    default:
     	die ($sKey . "does not exist");
		}//switch	
 
  	}//set

}//class








//test====================================================

// $oProducts = new Products();
// $oProducts->load(4);

// echo "<pre>";
// print_r($oProducts);
// echo "</pre>";


// $oProducts = new Products();

// $oProducts->ProductName = "gfgf";
// $oProducts->Description = "rgfr";
// $oProducts->Price = 4;
// $oProducts->BrandID = 1;
// $oProducts->PhotoPath = "s6edge.jpg";
// $oProducts->StockLevel = 2;
// $oProducts->Active = 2;

// $oProducts->save();


// echo "<pre>";
// print_r($oProducts);
// echo "</pre>";
?>