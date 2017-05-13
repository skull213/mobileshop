<?php 
require_once("connection.php");
require_once("Brands.php");

class BrandsManager{

	static public function getAllBrands(){
		$aBrands = array();

		$connection = new Connection();
		$sSQL = "SELECT BrandID FROM tbproductbrand";
		$resultSet = $connection->query($sSQL);

		while ($row = $connection->fetch_array($resultSet)) {
			$iBrandsID = $row["BrandID"];
			$oBrands = new Brands();
			$oBrands->load($iBrandsID);
			$aBrands[] = $oBrands;
		}

			$connection->close_connection();
			return $aBrands;
	}

}

//test
// $oBM = new BrandsManager();

// $aAllBrands = $oBM->getAllBrands();

// echo "<pre>";
// print_r($aAllBrands);
// echo "</pre>";

 ?>