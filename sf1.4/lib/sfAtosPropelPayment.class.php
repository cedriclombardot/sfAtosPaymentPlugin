<?php

class sfAtosPropelPayment extends sfAtosPayment{
	/**
	  * New SfAtosCart to save
	  *
	  * @return SfAtosCart
	  */
	private function getNewCart(){
	 	return new SfAtosCart();
	}
}
?>