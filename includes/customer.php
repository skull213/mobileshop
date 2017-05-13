<?php
require_once("connection.php"); 
class Customer{

	private $iCustomerID;
	private $sFirstName;
	private $sLastName;
	private $sAddress;
	private $iTelephone;
	private $sEmail;
	private $sUserName;
	private $iPassword;
	private $iCredit;
	private $iAdmin;


	public function __construct(){

		$this->iCustomerID = 0;
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sAddress = "";
		$this->iTelephone = "";
		$this->sEmail = "";
		$this->sUserName = "";
		$this->iPassword = "";
		$this->iCredit = 0;
		$this->iAdmin = 0;

	}//construct

	public function load($iCustomerID){

		$connection = new connection();
		$sQuery = "SELECT CustomerID,FirstName,LastName,Address,Telephone,Email,Password,Credit,UserName,Admin
				   FROM tbcustomer
				   WHERE CustomerID = ".$connection->escape($iCustomerID);

		$resultset = $connection->query($sQuery);

		$row = $connection->fetch_array($resultset);

		$this->iCustomerID = $row["CustomerID"];
		$this->sFirstName = $row["FirstName"];
		$this->sLastName = $row["LastName"];
		$this->sAddress = $row["Address"];
		$this->iTelephone = $row["Telephone"];
		$this->sEmail = $row["Email"];
		$this->sUserName = $row["UserName"];
		$this->iPassword = $row["Password"];
		$this->iCredit = $row["Credit"];
		$this->iAdmin = $row["Admin"];

		$connection->close_connection();
	} //load function


	public function loadByUserName($sUserName){

		$connection = new connection();
		$sQuery = "SELECT CustomerID  
				   FROM tbcustomer
				   WHERE UserName = '". $connection->escape($sUserName)."'";

	$resultset = $connection->query($sQuery);

	$row = $connection->fetch_array($resultset);

			if ($row == false) {
				return false;
			}else{
				$this->load($row["CustomerID"]);
				return true;

			}



		$connection->close_connection();
	}//load by username

	

	public function save(){

		$connection = new connection();
		
		if($this->iCustomerID == 0){
			$sSQL = "INSERT INTO tbcustomer (FirstName, LastName, Address, Telephone, Email, UserName, Password, Credit) 
					 VALUES ('".$connection->escape($this->sFirstName)."', '".$connection->escape($this->sLastName)."',
					 		 '".$connection->escape($this->sAddress)."', '".$connection->escape($this->iTelephone)."',
					 		 '".$connection->escape($this->sEmail)."', '".$this->sUserName."', '".$connection->escape($this->iPassword)."', 
					 		 '".$connection->escape($this->iCredit)."')";
					

			$bSuccess = $connection->query($sSQL);

			if ($bSuccess == true) {
				
				$this->iCustomerID = $connection->get_insert_id();
			}else{
				die($sSQL . "fails");
			}
		}else{
			//update 
			
			$sSQL =  "UPDATE  tbcustomer 
			SET  FirstName  =  '".$connection->escape($this->sFirstName)."',
			LastName   =  '".$connection->escape($this->sLastName)."',
			Address    =  '".$connection->escape($this->sAddress)."',
			Telephone  =  '".$connection->escape($this->iTelephone)."',
			Email      =  '".$connection->escape($this->sEmail)."',
			Credit     =  '".$connection->escape($this->iCredit)."' 
			WHERE  CustomerID =".$connection->escape($this->iCustomerID);


			$bSuccess = $connection->query($sSQL);
			if ($bSuccess == false) {
				die($sSQL . "fails");
			}
		}

	}//save function

	

	public function __get($sKey){

		switch ($sKey){
	 case "customerID":
        return $this->iCustomerID;
        break;		
    case "firstName":
        return $this->sFirstName;
        break;
    case "lastName":
        return $this->sLastName;
        break;
    case "address":
        return $this->sAddress;
        break;
    case "telephone":
        return $this->iTelephone;
        break;
    case "email":
        return $this->sEmail;
        break; 
    case "userName":
        return $this->sUserName;
        break; 
    case "password":
        return $this->iPassword;
        break; 
    case "credit":
        return $this->iCredit;
        break; 
      case "admin":
        return $this->iAdmin;
        break;         
    default:
     	die ($sKey . "does not exist");
		
		}//switch
	
	}//get function	

	public function __set($sKey,$value){

			switch ($sKey){
    case "firstName":
        return $this->sFirstName = $value;
        break;
    case "lastName":
        return $this->sLastName = $value;
        break;
    case "address":
        return $this->sAddress = $value;
        break;
    case "telephone":
        return $this->iTelephone = $value;
        break;
    case "email":
        return $this->sEmail = $value;
        break; 
    case "userName":
        return $this->sUserName = $value;
        break; 
    case "password":
        return $this->iPassword = $value;
        break; 
    case "credit":
        return $this->iCredit = $value;
        break;        
    default:
     	die ($sKey . "does not exist");
		
		}//switch

	}//set function

}//class

//test=========================================================================

// $oCustomer = new Customer();
// $oCustomer->loadByUserName("peter.pan");
// $oCustomer->firstName = "Miro";
// $oCustomer->lastName  = "Miro";
// $oCustomer->address   = "Bucklands Bucklands";
// $oCustomer->telephone = 02122222;
// $oCustomer->email = "miro@gmail.com";
// $oCustomer->userName = "miromiro13";
// $oCustomer->password = 2;
// $oCustomer->credit= 0;

// $oCustomer->save();

// echo "<pre>";
// print_r($oCustomer);
// echo "</pre>";




 ?>