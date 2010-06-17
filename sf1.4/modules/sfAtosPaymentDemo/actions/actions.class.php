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
		$properties = parse_ini_file(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'properties.ini', true);
		if($properties['symfony']['orm']=='Doctrine'){
			$payment_transaction=new sfAtosDoctrinePayment();
		}else{
			$payment_transaction=new sfAtosPropelPayment();
		}
		$payment_transaction->setAmount(100);
		$payment_transaction->setCustomerId(uniqid());
		$this->bank=$payment_transaction->doRequest();
	}
	
	public function executeConfirm(sfWebRequest $request){
		$properties = parse_ini_file(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'properties.ini', true);

		if($properties['symfony']['orm']=='Doctrine'){
			$this->sf_atos_cart=sf_atos_cartTable::retrieveByBankResponse($payment_transaction->getResponse());
		}else{
			$this->sf_atos_cart=SfAtosCartPeer::retrieveByBankResponse($payment_transaction->getResponse());
		}
		
		if(!sfAtosPaymentTools::isValidBankResponseCode($this->sf_atos_cart->getBankResponseCode()))
			return sfView::ERROR;
		return sfView::SUCCESS;
	}
	
	public function executeCancel(sfWebRequest $request){
		
		
		$properties = parse_ini_file(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'properties.ini', true);
		
		if($properties['symfony']['orm']=='Doctrine'){
			$payment_transaction=new sfAtosDoctinePayment();
			$this->sf_atos_cart=sf_atos_cartTable::retrieveByBankResponse($payment_transaction->getResponse());
			if($this->sf_atos_cart instanceof sf_atos_cart){
				$this->forward($this->getModuleName(),'confirm');
			}
		}else{
			$payment_transaction=new sfAtosPropelPayment();
			$this->sf_atos_cart=SfAtosCartPeer::retrieveByBankResponse($payment_transaction->getResponse());
			if($this->sf_atos_cart instanceof SfAtosCart){
				$this->forward($this->getModuleName(),'confirm');
			}
		}
		
	}
}
?>