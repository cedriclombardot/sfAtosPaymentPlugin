<?php

class sfAtosPropelPayment extends sfAtosPayment{
	/**
	  * New SfAtosCart to save
	  *
	  * @return SfAtosCart
	  */
	function getNewCart(){
	 	return new SfAtosCart();
	}
}
?>