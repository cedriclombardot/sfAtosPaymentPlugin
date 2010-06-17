<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPayment
 * @version sf1.2 - 0.1
 * 
 * Cette classe enregistre les paiements en ligne
 * 
 * 
 */

abstract class sfAtosPayment extends sfAtosPaymentBase{
 	
	/**
 	  * Variables liés à l'étape une - Requette
 	  */
 	  
	 /** Chemin des binaires */
	 private $_bin_path;
	 
	 private $_request_bin_name;
	 
	 private $_response_bin_name;
	
 	 /**  Numéro du commercant */
	 private $_merchant_id;
	 
	 /** Pays du commercant */
	 private $_merchant_country;
	 
	 /** Montant en centimes */
     private $_amount;
     
     /** Code de la monnai */
	 private $_currency_code;
	 
	 /** Chemin de pathfile */
	 private $_pathfile;
	 
	 private $_transaction_id;
	 /** Numéro de la commande */
	 private $_order_id;
	 
	 /** Numéro du client */
	 private $_customer_id;
	 
	 /** Email du client */
	 private $_customer_email;
	 
	 /** Adresse IP du client */
	 private $_customer_ip_address;
	 
	 /** Langue du site */
	 private $_language;
	 
	  /** Langue du commercant **/
	 private $_merchant_language;
	 
	 /** Contenu du caddie */
	 private $_caddie;
	 
	 /** Context de la commande */
	 private $_return_context;
	 
	 /** Url de retour normal */
	 private $_normal_return;
	 
	 /** Url de retour Echec */
	 private $_cancel_return;
	 
	 /** Url automatique de taitement de la réponsee */
	 private $_automatic_return;
	 
	 /** Payement différé */
	 private $_capture_day;
	 
	 /** Mode de paiment différé */
	 private $_capture_mode;
	 
	 /** new Cart 
	  * @return sf_atos_cart 
	  */
	 abstract function getNewCart();
	 
	 /**
	  * Ouvre une transaction
	  */
	 public function __construct(){
	 	$this->parseConfig();
	 }
	 
	 private function parseConfig(){
	 	$this->_currency_code=sfAtosPaymentTools::getCurrencyCode(sfAtosPaymentConfig::get('currency_code','EUR'));
	 	$this->_merchant_country=sfAtosPaymentConfig::get('merchant_country','fr');
	 	$this->_merchant_id=sfAtosPaymentConfig::get('merchant_id');
	 	$this->_bin_path=sfAtosPaymentConfig::get('binpath');
	 	$lang=sfAtosPaymentConfig::get('merchant_language',(string) $this->getUser()->getCulture());
	 	$this->_merchant_language=$this->setMerchantLanguage($lang);
	 	
	 	$this->_request_bin_name=sfAtosPaymentConfig::get('bin_request','request');
	 	$this->_response_bin_name=sfAtosPaymentConfig::get('bin_response','response');
	 	
	 	$this->_normal_return=sfAtosPaymentConfig::get('confirmation_url','@homepage');
	 	$this->_cancel_return=sfAtosPaymentConfig::get('cancel_url','@homepage');
	 	
	 	$this->_automatic_return=sfAtosPaymentConfig::get('autoresponse_url','sfAtosPayment/response');
	 	
	 	if(!file_exists($this->_bin_path.DIRECTORY_SEPARATOR.$this->_request_bin_name)){
	 		$finder=sfFinder::type('file')->name($this->_request_bin_name)->in(sfAtosPaymentConfig::get('binpath',sfConfig::get('sf_root_dir')));
	 		if(sizeof($finder)>0){
	 			$finder=$finder[0];
	 			$this->_bin_path=dirname($finder);
	 		}else{
	 			throw new Exception('Bin Path invalide '.$this->_bin_path);
	 		}
	 	}
	 	
	 	$this->_pathfile=sfAtosPaymentConfig::get('pathfile_path',sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'sfAtosPaymentPlugin'.DIRECTORY_SEPARATOR.'atos');
	 	$this->_pathfile.=DIRECTORY_SEPARATOR.'pathfile';
	 	
	 	if(!file_exists($this->_pathfile)){
	 		throw new Exception('pathfile introuvable');
	 	}
	 	
	 	$this->_language=$this->getUser()->getCulture();
	 	if(!in_array($this->_language,self::$_languages))
	 		$this->_language='fr';
	 	
	 		
	 		
	 	
	 }
	 
 	/**
	  * Execute la requette
	  */
	 public function doRequest(){
	 	if(!sfAtosPaymentTools::isValidAmount($this->getAmount()))
	 		throw new Exception('Amount must be an integer greater than 0');
	 	if(!sfAtosPaymentTools::isValidMerchantId($this->getMechantId()))
	 		throw new Exception('Invalid merchant_id ');
	 	if(!$this->getOrderId())
	 		$this->setOrderId(sfAtosPaymentTools::generateOrderId());
	 	
	 	if(!$this->getCustomerId())
	 		throw new Exception('Vous devez enregistrer un numéro de client afin de le retrouver');
	 	
	 	$result=exec($this->_bin_path.DIRECTORY_SEPARATOR.$this->_request_bin_name.' '.$this->buildRequest());
	 	
	 	$tableau = explode ("!", $result);
	 	
		 if ($tableau[1] == '' && $tableau[2] == '') 
		 	throw new Exception('Impossible de trouver l\'executable: ' . $this->_bin_path.DIRECTORY_SEPARATOR.$this->_request_bin_name);
	     elseif ($tableau[1] != 0) 
		 	throw new Exception('Erreur API '. $tableau[2]);
		
		 return $tableau[3];
	 }
	
	private function buildRequest(){
		// Commercant 
		 $parm = "merchant_id=" . $this->getMechantId();
		 $parm .= " merchant_country=" . $this->getMechantCountry();
		
		 $parm .= " merchant_language=".$this->getMerchantLanguage();
		 
		 // Achat
		 $parm .= " amount=" .$this->getAmount();
		 $parm .= " currency_code=" .$this->getCurrencyCode();
		 $parm .= " order_id=". $this->getOrderId();
		 
		 if($this->getCaddie())
		 	$parm .= " caddie=". $this->getCaddie();
		 	
		 if($this->getReturnContext())
		 	$parm .= " return_context=". $this->getReturnContext();
		 
		 /**
		  * @todo paiement différé
		  * 
		  */
		 $parm .=" transaction_id=".$this->getTransactionId();
		 	
		 //Client
		 $parm .= " customer_id=".$this->getCustomerId();
		 $parm .= " customer_email=".$this->getCustomerEmail();
		 $parm .= " customer_ip_address=".$this->getCustomerIpAdress();
		 $parm .= " language=".$this->getLanguage();
		 
		 //Exec
		 $parm .= " pathfile=" . $this->_pathfile;
		 $parm .= " normal_return_url=" . $this->getController()->genUrl($this->getConfirmUrl(),true);
	 	 $parm .= " cancel_return_url=" . $this->getController()->genUrl($this->getCancelUrl(),true);
		 $parm .= " automatic_response_url=" . $this->getController()->genUrl($this->getAutoResponseUrl(),true);
	
		return $parm;
	 
	}
	
	
	/**
	 * Execute La réponse automatique
	 * 
	 * @return sfAtosCart
	 */
	 public function doResponse(){
	 	
		 return $this->saveResponse($this->getResponse());
	 }
	 
	 public function getResponse(){
	 	$result=exec($this->_bin_path.DIRECTORY_SEPARATOR.$this->_response_bin_name.' '.$this->buildResponseRequest());
	 	$tableau = explode ("!", $result);
	 	
	 	
	 	if ($tableau[1] == '' && $tableau[2] == '') 
		 	throw new Exception('Impossible de trouver l\'executable: ' . $this->_bin_path.DIRECTORY_SEPARATOR.$this->_request_bin_name);
	    elseif ($tableau[1] != 0) {
		 	throw new Exception('Erreur API '. $tableau[2]);
	    }
	    
		return $tableau;
	
	 }
	 
	 
	 /**
	  * save the response into the database
	  *
	  * @param array $tableau
	  * @return sf_atos_cart|sfAtosCart depends of ORM doctrine|propel
	  */
	 private function saveResponse($tableau){
	 	$sf_atos_cart=new $this->getNewCart();
	 	//Le commercant
	 	$sf_atos_cart->setMerchantId($tableau[3]);
	 	$sf_atos_cart->setMerchantCountry($tableau[4]);
	 	$sf_atos_cart->setMerchantLanguage($tableau[24]);
	 	
	 	//Achat
	 	$sf_atos_cart->setAmount($tableau[5]);
	 	$sf_atos_cart->setOrderId($tableau[27]);
	 	$sf_atos_cart->setCurrencyCode($tableau[14]);
	 	$sf_atos_cart->setCaddie($tableau[22]);
	 	$sf_atos_cart->setReturnContext($tableau[21]);
	 	
	 	//Transaction
	 	$sf_atos_cart->setTransactionId($tableau[6]);
	 	
	 	if(!is_string($tableau[8])){
	 	$transmission_date=mktime(substr($tableau[8],8,2),substr($tableau[8],10,2),substr($tableau[8],12,2),substr($tableau[8],4,2),substr($tableau[8],6,2),
		substr($tableau[8],0,4));
	 	}
		$sf_atos_cart->setTransmissionDate($tableau[8]);
		
		$payement_timestamp=mktime(substr($tableau[9],0,2),substr($tableau[9],2,2),
		substr($tableau[9],4,2),substr($tableau[10],4,2),substr($tableau[10],6,2),
		substr($tableau[10],0,4));
		$sf_atos_cart->setPaymentTime($payement_timestamp);

		$sf_atos_cart->setResponseCode($tableau[11]);
		$sf_atos_cart->setPaymentCertificate($tableau[12]);
		$sf_atos_cart->setAuthorisationId($tableau[13]);
		
		//La carte
		$sf_atos_cart->setPaymentMeans($tableau[7]);
		$sf_atos_cart->setCardNumber($tableau[15]);
		$sf_atos_cart->setCvvFlag($tableau[16]);
		$sf_atos_cart->setCvvResponseCode($tableau[17]);
		
		//Paiement différé
		$sf_atos_cart->setCaptureDay($tableau[30]);
		$sf_atos_cart->setCaptureMode($tableau[31]);
		
		//Réponse de la banque
		$sf_atos_cart->setBankResponseCode($tableau[18]);
		$sf_atos_cart->setComplementaryCode($tableau[19]);
		$sf_atos_cart->setComplementaryInfo($tableau[20]);
		
		
		//Flag en haut du ticket non sauvegardé receipt_complement     = $tableau[23];
		
		//Le client
		$sf_atos_cart->setLanguage($tableau[25]);
		$sf_atos_cart->setCustomerId($tableau[26]);
		$sf_atos_cart->setCustomerEmail($tableau[28]);
		$sf_atos_cart->setCustomerIpAddress($tableau[29]);
		
		//La reponse
		$sf_atos_cart->setDatas($tableau[32]);
		
		//Save
		try{
		$sf_atos_cart->save();
		}catch(Exception $e){
		mail('lombardot@spyrit.net','EXE',$e->getMessage());
		}
		return $sf_atos_cart;
		
	 }
	 private function buildResponseRequest(){
	 	$parm =" pathfile=".$this->_pathfile;
	 	$parm .=" message=".$this->getRequest()->getParameter('DATA');
	 	return $parm;
	 }
	/**
	 * Change la valeur de _automatic_return
	 * 
	 * return self
	 */
	 public function setAutoResponseUrl($autoresponse_url){
 		$this->_automatic_return=$autoresponse_url;
	 	return $this;
	 }
	 
	 public function getAutoResponseUrl(){
	 	return $this->_automatic_return;
	 }
	 
	/**
	 * Change la valeur de _cancel_return
	 * 
	 * return self
	 */
	 public function setCancelUrl($cancel_url){
 		$this->_cancel_return=$cancel_url;
	 	return $this;
	 }
	 
	 public function getCancelUrl(){
	 	return $this->_cancel_return;
	 }
	 
	 public function getTransactionId(){
	 	return $this->_transaction_id;
	 }
	public function setTransactionId($transaction_id){
	 	$this->_transaction_id=$transaction_id;
	 	return $this;
	 }
	/**
	 * Change la valeur de _normal_return
	 * 
	 * return self
	 */
	 public function setConfirmUrl($confirm_url){
 		$this->_normal_return=$confirm_url;
	 	return $this;
	 }
	 
	 public function getConfirmUrl(){
	 	return $this->_normal_return;
	 }
	 
	/**
	 * Change la valeur de return_context
	 * 
	 * return self
	 */
	 public function setReturnContext($return_context=null){
 		$this->_return_context=$return_context;
	 	return $this;
	 }
	 
	 public function getReturnContext(){
	 	return substr($this->_return_context,0,256);
	 }
	 
	/**
	 * Change la valeur de caddie
	 * 
	 * return self
	 */
	 public function setCaddie($caddie=null){
 		$this->_caddie=$caddie;
	 	return $this;
	 }
	 
	 public function getCaddie(){
	 	return substr($this->_caddie,0,2048);
	 }
	 
	/**
	 * Change la langue du commercant
	 * 
	 */
	 public function setMerchantLanguage($language='fr'){
	 	
	 	if(in_array($language,self::$_languages)){
	 		$this->_merchant_language=$language;
	 	}
	 }
	 
	 public function getMerchantLanguage(){
	 	
	 	 
	 	return $this->_merchant_language;
	 }
	/**
	 * Change la langue de l'interface du client
	 * 
	 * return self
	 */
	 public function setLanguage($language='fr'){
	 	if(in_array($language,self::$_languages))
	 		$this->_language=$language;
	 	return $this;
	 }
	 
	 public function getLanguage(){
	 	return $this->_language;
	 }
	/**
	 * Retourne l'adresse Ip
	 */
	public function getCustomerIpAdress(){
		return $this->_customer_ip_address=$this->getRequest()->getRemoteAddress();
	}
	
	/**
	 * @return sfController
	 */
	public function getController(){
		return sfContext::getInstance()->getController();
	}
	/**
	 * @return sfWebRequest
	 */
	public function getRequest(){
		return sfContext::getInstance()->getRequest();
	}
	
	/**
	 * @return sfUser
	 */
	public function getUser(){
		return sfContext::getInstance()->getUser();
	}
	
	/**
	  * Change le customerId
	  * 
	  * @return self
	  */
	public function setCustomerId($customer_id){
	 		$this->_customer_id=$customer_id;
	 	return $this;
	 }
	 
	 public function getCustomerId(){
	 	return $this->_customer_id;
	 }
	/**
	  * Change le customerEmail
	  * 
	  * @return self
	  */
	public function setCustomerEmail($email=null){
		if((preg_match('/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i',$email))||(is_null($email)))
	 		$this->_customer_email=$email;
	 	else
	 		throw new Exception('Email invalide');
	 	return $this;
	 }
	 
	 public function getCustomerEmail(){
	 	return $this->_customer_email;
	 }
	 
	 /**
	  * Change l'orderId
	  * 
	  * @return self
	  */
	 public function setOrderId($order_id){
	 	$this->_order_id=$order_id;
	 	return $this;
	 }
	 
	 public function getOrderId(){
	 	return $this->_order_id;
	 }
	 
	/**
	 * Change l'id du commercant
	 * @return self
	 */
	public function setMechantId($merchant_id){
		if(!sfAtosPaymentTools::isValidMerchantId($merchant_id))
			throw new Exception('Invalid merchant_id '.$merchant_id);
	 	$this->_merchant_id=$merchant_id;
	 	return $this;
	 }
	 public function getMechantId(){
	 	return $this->_merchant_id;
	 }
	/**
	 * Change le pays du commercant
	 * @return self
	 */
	public function setMechantCountry($country){
		if(!in_array($country,self::$_languages))
			throw new Exception('Invalid country name '.$country);
	 	$this->_merchant_country=$country;
	 	return $this;
	 }
	 
	 public function getMechantCountry(){
	 	return $this->_merchant_country;
	 }
	 
	 /**
	  * Change la valeur du currency_code
	  *
	  * @param mixed soit le code soit le chiffre du code de currency 
	  */
	 public function setCurrencyCode($code='EUR'){
	 	if(is_numeric($code)){
	 		if(sfAtosPaymentTools::isValidCurrencyCode($code)){
	 			$this->_currency_code=$code;
	 			return $this;
	 		}
	 		return false;
	 	}
	 	$this->_currency_code=sfAtosPaymentTools::getCurrencyCode($code);
	 	return $this;
	 }
	 
	 public function getCurrencyCode(){
	 	return $this->_currency_code;
	 }
	 
	 /**
	  *  Ecrit le montant en centimes
	  */
	 public function setAmount($amount){
	 	if(!sfAtosPaymentTools::isValidAmount($amount))
	 		throw new Exception('Amount must be an integer greater than 0');
	 	$this->_amount=$amount;
	 	return $this;
	 }
	 
	 public function getAmount(){
	 	return $this->_amount;
	 }
	 
	 
	 
	 
	
}
?>