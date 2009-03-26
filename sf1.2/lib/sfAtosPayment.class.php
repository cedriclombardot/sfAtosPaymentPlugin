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
	 
	 /** Chemin des executables */
	 private $_pathfile;
	 
	 /** Binaire pour la requette */
	 private $_request_cmd;
	 
	 /** Binaire pour la réponse */
	 private $_response_cmd;
	 
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
	 
	 /** Code de réponse retourné par la bank */
	 private $_response_code;
	 
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
	 
	 /** Retour de la réponse $_bank_response_code */
	 private $_bank_response_code;
	 
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
	 }
	 
 	/**
	  * Execute la requette
	  */
	 public function doRequest(){
	 	if(!$this->isValidAmount())
	 		throw new Exception('Amount must be greater than 0');
	 	
	 	
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
	 	if(!is_integer($amount))
	 		throw new Exception('Amount must be an integer');
	 	if($amount<=0)
	 		throw new Exception('Amount must be greater than 0');
	 	$this->_amount=$amount;
	 	return $this;
	 }
	 
	 public function getAmount(){
	 	return $this->amount;
	 }
	 
	 public function isValidAmount(){
	 	return ($this->amount>0);
	 }
	 
	
}
?>