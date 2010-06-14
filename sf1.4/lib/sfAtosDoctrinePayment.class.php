<?php

class sfAtosDoctrinePayment extends sfAtosPayment{
	/**
	  * New sf_atos_cart to save
	  *
	  * @return sf_atos_cart
	  */
	private function getNewCart(){
	 	return new sf_atos_cart();
	}
}
?>