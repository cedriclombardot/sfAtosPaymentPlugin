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
 * @see Inspiré de sfPaymentSIPSPlugin/modules/sfPaymentSIPS/lib/sfPaymentSIPS.class.php
 * 
 */

class sfAtosPayment extends sfAtosPaymentBase{
 	
	/**
 	  * Variables liés à l'étape une - Requette
 	  */
 	  
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
	 
	 
	 /** Numéro de la commande */
	 private $_order_id;
	 
	  /**
 	  * Variables liés à l'étape 2 - Réponse
 	  */
	 
	 /** Numéro de la transaction */
	 private $_transaction_id;
	
	 /** Moyen de paiement */
	 private $_payment_means;
	 
	 /** Date de la transmission */
	 private $_transmission_date;
	 
	 /** Heure de paiement */
	 private $_payment_time;
	 
	 /** Date de paiement */
	 private $_payment_date;
	 
	
	 /** Certificat de paiement */
	 private $_payment_certificate;
	 
	 /** Numéro de l'autorisation */
	 private $_authorisation_id;
	 
	 /** Numéro de la CB partiel */
	 private $_card_number;
	 
	 /** Retour du CVV flag à annalyser avec self::$_cvv_flag_code */
	 private $_cvv_flag;
	 
	 /** Retour de la validation du CVV flag */
	 private $_cvv_response_code;
	 
	 
	 /** Code complémentaire */
	 private $_complementary_code;
	 
	 /** Information complémentaires */
	 private $_complementary_info;
	 
	 /** Context de retour */
	 private $_return_context;
	 
	 /** Contenu du caddie */
	 private $_caddie;
	 
	 /** Complément */
	 private $_receipt_complement;
	 
	 /** Langue du commercant **/
	 private $_merchant_language;
	 
	 /** Langue du site */
	 private $_language;
	 
	 /** Numéro du client */
	 private $_customer_id;
	 
	 /** Email du client */
	 private $_customer_email;
	 
	 /** Adresse IP du client */
	 private $_customer_ip_address;
	 
	 /** Payement différé */
	 private $_capture_day;
	 
	 /** Mode de paiment différé */
	 private $_capture_mode;
	 
	 /** Toute la requette chiffré */
	 private $_data;  
	 
	 
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
	 	$this->_request_bin_name=sfAtosPaymentConfig::get('bin_request','request');
	 	$this->_response_bin_name=sfAtosPaymentConfig::get('bin_response','response');
	 	
	 	
	 	if(!file_exists($this->_bin_path.DIRECTORY_SEPARATOR.$this->_request_bin_name)){
	 		$finder=sfFinder::type('file')->name($this->_request_bin_name)->in(sfAtosPaymentConfig::get('binpath',sfConfig::get('sf_root_dir')));
	 		if(sizeof($finder)>0){
	 			$finder=$finder[0];
	 			$this->_bin_path=dirname($finder);
	 		}else{
	 			throw new Exception('Bin Path invalide '.$this->_bin_path);
	 		}
	 	}
	 }
	 
 	/**
	  * Execute la requette
	  */
	 public function doRequest(){
	 	if(!sfAtosPaymentTools::isValidAmount($this->getAmount()))
	 		throw new Exception('Amount must be an integer greater than 0');
	 	if(!sfAtosPaymentTools::isValidMerchantId($this->getMechantId()))
	 		throw new Exception('Invalid merchant_id');
	 	
	 }
	
	/**
	 * Change l'id du commercant
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