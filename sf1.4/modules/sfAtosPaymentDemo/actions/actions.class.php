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
		$this->bank=$payment_transaction->doRequest();
	}
	
	public function executeConfirm(sfWebRequest $request){
		$properties = parse_ini_file(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'properties.ini', true);

		if($properties['orm']=='Doctrine'){
			$this->sf_atos_cart=sf_atos_cartTable::retrieveByBankResponse($payment_transaction->getResponse());
		}else{
			$this->sf_atos_cart=SfAtosCartPeer::retrieveByBankResponse($payment_transaction->getResponse());
		}
		
		if(!sfAtosPaymentTools::isValidBankResponseCode($this->sf_atos_cart->getBankResponseCode()))
			return sfView::ERROR;
		return sfView::SUCCESS;
	}
	
	public function executeCancel(sfWebRequest $request){
		$payment_transaction=new sfAtosPayment();
		
		$properties = parse_ini_file(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'properties.ini', true);

		if($properties['orm']=='Doctrine'){
			$this->sf_atos_cart=sf_atos_cartTable::retrieveByBankResponse($payment_transaction->getResponse());
			if($this->sf_atos_cart instanceof sf_atos_cart){
				$this->forward($this->getModuleName(),'confirm');
			}
		}else{
			$this->sf_atos_cart=SfAtosCartPeer::retrieveByBankResponse($payment_transaction->getResponse());
			if($this->sf_atos_cart instanceof SfAtosCart){
				$this->forward($this->getModuleName(),'confirm');
			}
		}
		
	}
}
?>