<?php 
class Form{

	private $sHTML;
	private $aData;
	private $aFiles;
	private $aErrors;


	public function __construct(){
		$this->sHTML = '<form id="form" action="" method="post" enctype="multipart/form-data">' ."\n";
		$this->aData = array();
		$this->aFiles = array();
		$this->aErrors = array();

	}

	public function makeFileInput($sControlName, $sControlLabel){
		
		$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {		
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sControlLabel.'</label>';
		$this->sHTML .=	'<input type="file" class="field" id="'.$sControlName.'" name="'.$sControlName.'" />'."\n";
		$this->sHTML .= '<span class="errors">' . $sErrors. '</span>' ."\n";		
	}

	public function moveFile($sControlName,$sNewName){

		$sNewPath = dirname(__FILE__).'/../img/'.$sNewName;
		move_uploaded_file($this->aFiles[$sControlName]['tmp_name'], $sNewPath); //move function
	}

	public function makeInput($sControlName,$sControlLabel){
		

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}

		$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {		
			$sErrors = $this->aErrors[$sControlName];
		}
	
		$this->sHTML .= '<label for="'.$sControlName.'">'.$sControlLabel.'</label>';
		$this->sHTML .=	'<input type="text" class="field" id="'.$sControlName.'" name="'.$sControlName.'"value="'.$sData.'"/>'."\n";
		$this->sHTML .= '<span class="errors">' . $sErrors. '</span>' ."\n";

	}

	public function makePassword($sControlName,$sControlLabel){
		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = $this->aData[$sControlName];
		}

			$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {		
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sControlLabel.'</label>';
		$this->sHTML .=	'<input type="password" id="'.$sControlName.'" name="'.$sControlName.'" value="'.$sData.'"/>'."\n";
		$this->sHTML .= '<span class="errors">' . $sErrors. '</span>' ."\n";
	}

	public function makeSubmit($sControlName,$sControlLabel){
		$this->sHTML .= '<input type="submit" name="'.$sControlName.'" value="'.$sControlLabel.'"/>';
	}

	public function checkFilled($sControlName){

		$sData = $this->aData[$sControlName];
		if (strlen($sData) == 0) {
			$this->aErrors[$sControlName] = "Must be filled in";
		}
	}

	public function checkFileUploaded($sControlName){

		if (isset($this->aFiles[$sControlName]) == false) {
			$this->aErrors[$sControlName] = "file not uploaded";
		}else{
			if($this->aFiles[$sControlName]["error"] != 0) {
				$this->aErrors[$sControlName] = "file has errors";	
			}
		}
	}

	public function checkSame($sControlName1,$sControlName2){
		$sData1 = $this->aData[$sControlName1];
		$sData2 = $this->aData[$sControlName2];
		if ($sData1 !== $sData2) {
			$this->aErrors[$sControlName2] = "Does not match";
		}

	}

	public function raiseCustomError($sControlName,$sErrors){

		$this->aErrors[$sControlName] = $sErrors;
	}




	public function __get($sKey){
		switch ($sKey) {
			case 'HTML':
				return $this->sHTML. '</form>';
				break;
			case 'valid':
				if (count($this->aErrors) ==0) {
					return true;
				}else{
					return false;
				}
				break;
			default:
				die($sKey . "does not exist");
				break;
		}//switch
	}//get


	public function __set($sKey,$value){
		switch ($sKey) {
			case 'data':
				$this->aData = $value;
				break;
				case 'files':
				$this->aFiles = $value;
				break;	
			default:
				die($sKey . "does not exist");
				break;
		}
	}

}//class form


 ?>