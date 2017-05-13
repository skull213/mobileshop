<?php 
class View{
	
	static public function renderNav($aBrands){
		$sOutput = "";
		for($iCount=0; $iCount<count($aBrands);$iCount++){

			$oBrand = $aBrands[$iCount];
			$sOutput .= '<li><a href="samsung.php?BrandID='.$oBrand->BrandID.'">'.$oBrand->BrandName.'</a></li>';

				

		}

		return $sOutput;
	}

	static public function renderBrand($oBrand){
		$sOutput = '<h1>'.$oBrand->BrandName.'</h1>';
		$aProducts = $oBrand->products;

		for($iCount=0; $iCount<count($aProducts);$iCount++){
				$oProduct = $aProducts[$iCount];
				
				 	
				 	
					$sOutput  .=  '<div class="pics">';
					$sOutput  .=  '<img src="./img/'.$oProduct->PhotoPath.'">';
					$sOutput  .=  '<div class="info">';
					$sOutput  .=  '<h1>'.$oProduct->ProductName.'</h1>';
					$sOutput  .=  '<p>'.$oProduct->Description.'</p>';
					$sOutput  .=  '<span>'.$oProduct->Price.'</span>';
					$sOutput  .=  '<a href="addToCart.php?ProductID='.$oProduct->ProductID.'"><i class="fa fa-cart-plus "></i></a>';
					$sOutput  .=  '</div>';
					$sOutput  .=  '</div>';

		}
	

		return $sOutput;

	}//render brand


	static public function renderCustomer($oCustomer){
					

					$sOutput  =  '<div id="mainpage">';
					$sOutput  .= '<div id="mydetails1">';
					$sOutput  .= 'FirstName :'.htmlentities($oCustomer->firstName).'<br></br>';
					$sOutput  .= 'LastName:'.htmlentities($oCustomer->lastName).'<br></br>';
					$sOutput  .= 'Telephone:'.htmlentities($oCustomer->telephone).'<br></br>';
					$sOutput  .= 'Email:'.htmlentities($oCustomer->email).'<br></br>';
					$sOutput  .= 'UserName:'.htmlentities($oCustomer->userName).'<br></br>';
					// $sOutput  .= 'Password:'.$oCustomer->password.'<br></br>';
					$sOutput  .= 'credit:'.$oCustomer->credit.'<br></br>';
					$sOutput  .=  '</div>';
					$sOutput  .= '</div>';

		return $sOutput;
	}//render customer


	static public  function renderCart($oCart){

		$aContents = $oCart->contents;

		$sOutput ='<div id="mainpage">';
		$sOutput .='<h2>Shoping Cart</h2>';
			
		$sOutput .='<div id="cart">';
		$sOutput .='<div id="Product">Product</div>';
		$sOutput .='<div id="Quantity">Quantity</div>';
		$sOutput .='<div id="Price">Price</div>';
		$sOutput .='<div id="Total">Total</div>';		
		$sOutput .='<div id="imgRem"></div>';

		$fTotal = 0; // sub total

		foreach($aContents as $iProductID=>$iQuanity){ 

			$oProduct = new Products();
			$oProduct->load($iProductID);

			$sOutput .='<div id="b1">'.$oProduct->ProductName.'</div>';
			$sOutput .='<div id="b2">'.$iQuanity.'</div>';
			$sOutput .='<div id="b3">'.$oProduct->Price.'</div>';
			$sOutput .='<div id="b4">'.$iQuanity*$oProduct->Price.'</div>';
			// $sOutput  .=  '<a href="remove.php?ProductID='.$oProduct->ProductID.'">remove</a>';		
			$sOutput .='<div id="b5"><a href="remove.php?ProductID='.$oProduct->ProductID.'"><i class="fa fa-times fa-2x"></i></a></div>';

			$fTotal += $iQuanity*$oProduct->Price; //subtotall
		}


			$sOutput .= '<div id="box1"></div>';
			$sOutput .=	'<div id="box2"></div>';
			$sOutput .=	'<div id="ordTotal">Order Total</div>';
			$sOutput .=	'<div id="totalPrice">'.$fTotal.'</div>';		
			$sOutput .=	'<div id="imgRem1"></div>';
			$sOutput .=	'</div>';
			$sOutput .= '</div>';
					
		

		return $sOutput;

	}//render cart 


}//class

 ?>