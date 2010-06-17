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
		$properties = parse_ini_file(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'properties.ini', true);

		if($properties['symfony']['orm']=='Doctrine')
			$payment_transaction=new sfAtosDoctrinePayment();
		else
			$payment_transaction=new sfAtosPropelPayment();
		
			
		$payment_transaction->doResponse();
		
		$this->setLayout(false);
		
	}
	
	
}
?>