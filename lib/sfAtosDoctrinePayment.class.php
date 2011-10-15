<?php

class sfAtosDoctrinePayment extends sfAtosPayment{
	/**
	  * New sf_atos_cart to save
	  *
	  * @return sf_atos_cart
	  */
	function getNewCart(){
		Doctrine_Core::loadModel('sf_atos_cart');
	 	return 'sf_atos_cart';
	}
}
?>