<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPayment
 * @version sf1.4 - 0.1
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
		if(array_search('sfDoctrinePlugin',$this->getContext()->getConfiguration()->getPlugins()))
			$payment_transaction=new sfAtosDoctrinePayment();
		else
			$payment_transaction=new sfAtosPropelPayment();
			
		$payment_transaction->doResponse();
		
		$this->setLayout(false);
		
	}
	
	
}
?>