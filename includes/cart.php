<?php 
require_once("connection.php");
class Cart{

	private $sContents;


	public function __construct(){

		$this->aContents = array();
	}//construct


	public function add($iProductID){
		if(isset($this->aContents[$iProductID]) == false){
			$this->aContents[$iProductID] =1;
			}else{
				$this->aContents[$iProductID] ++;
			}
		
	}//add function


	public function remove($iProductID){
		$this->aContents[$iProductID] --;
		if ($this->aContents[$iProductID]<=0) {
			unset($this->aContents[$iProductID]);
		}

	}//remove function


	public function __get($sKey){
		switch ($sKey) {
			case 'contents':
				return $this->aContents;
				break;
			
			default:
				die($sKey."does not exist!");
				break;
		}
	}


}//class

//test-----------------------------------

// $oCart = new Cart();
// $oCart->add(2);
// $oCart->add(2);
// $oCart->add(3);
// $oCart->add(4);

// // $oCart->remove(4);




// echo "<pre>";
// print_r($oCart);
// echo "</pre>";

 ?>