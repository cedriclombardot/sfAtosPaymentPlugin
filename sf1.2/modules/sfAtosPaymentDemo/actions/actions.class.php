<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPaymentDemo
 * @version sf1.2 - 0.1
 * 
 * Module de démo
 * 
 * 
 */

class sfAtosPaymentDemoActions extends sfActions {
	
	public function executeIndex(sfWebRequest $request){
		$payment_transaction=new sfAtosPayment();
		$payment_transaction->setAmount(100);
		$payment_transaction->setCustomerId(uniqid());
		$payment_transaction->doRequest();
	}
}
?>