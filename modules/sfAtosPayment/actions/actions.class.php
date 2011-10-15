<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPayment
 * @version sf1.2 - 0.1
 * 
 * Module de gestion des réponses automatiques
 * 
 * 
 */

class sfAtosPaymentActions extends sfActions {
	
	/**
	 * Auto response
	 */
	public function executeResponse(sfWebRequest $request){
		
		$payment_transaction=new sfAtosPayment();
		$payment_transaction->doResponse();
		
		$this->setLayout(false);
		
	}
	
	
}
?>