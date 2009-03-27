<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPaymentTools
 * @version sf1.2 - 0.1
 * 
 * Cette classe permet de traduire les varible d'une transaction en un
 * language lisible par un être humain
 * 
 * 
 */

class sfAtosPaymentTools extends sfAtosPaymentBase{
	
	/**
	 * Retourne la liste ces currencies possibles
	 * 
	 * @access public
	 * @static 
	 * @return array liste des monnaies aux format Array(NOM=>CODE,..);
	 */
	public static function getCurrencies(){
		return self::$_currencies;
	}
	
	/**
	 * Retourne le currency_code en fonction de la valeur
	 * 
	 * @access public
	 * @static 
	 * @param string $name Nom de la monnaie (default EUR)
	 * 
	 * @return integer Code de la monnaie
	 */
	public static function getCurrencyCode($name='EUR'){
		if(array_key_exists($name,sfAtosPaymentBase::$_currencies))
			return self::$_currencies[$name];
		throw new Exception('Impossible de trouver la monnaie >> '.$name.' << ');
	}
	
	/**
	 * Test si le code est une cles de  $_currency_code
	 * 
	 * @access public
	 * @static 
	 * @param integer Code de la monaie
	 * 
	 * @return boolean true si dans la liste
	 */
	public static function isValidCurrencyCode($code){
		return (in_array($code,sfAtosPaymentBase::$_currencies));
	}
	
	/**
	 * Retourne le nom de la money en fonction du currency_code
	 *
	 * @access public
	 * @static 
	 * @param integer $code Code de la monnaie
	 * 
	 * @return string Nom de la monnaie
	 */
	public static function getCurrencyName($code){
		if(self::isValidCurrencyCode($code))
			return array_search($code,sfAtosPaymentBase::$_currencies);
		throw new Exception('Impossible de trouver le code >> '.$code.' << ');
	}
	
	/**
	 * Retourne le texte du cvv flag code en fonction du cvv_flag_code
	 *
	 * @access public
	 * @static 
	 * @param integer $code cvv_flag_code
	 * 
	 * @return string Desciption
	 */
	public static function getCvvFlagCodeName($code){
		if(in_array($code,self::$_cvv_flag_code))
			return self::__(array_search($code,sfAtosPaymentBase::$_cvv_flag_code));
		throw new Exception('Impossible de trouver le code >> '.$code.' << ');
	}
	
	
	/**
	 * Retourne le texte du cvv verification codeen fonction du cvv_verification_code
	 *
	 * @access public
	 * @static 
	 * @param integer $code cvv_verification_code
	 * 
	 * @return string Desciption
	 */
	public static function getCvvVerificationCodeName($code){
		if(in_array($code,self::$_cvv_verification_code))
			return self::__(array_search($code,sfAtosPaymentBase::$_cvv_verification_code));
		throw new Exception('Impossible de trouver le code >> '.$code.' << ');
	}
	
	/**
	 * Retourne le texte du response code en fonction du response_code
	 *
	 * @access public
	 * @static 
	 * @param integer $code response_code
	 * 
	 * @return string Desciption
	 */
	public static function getResponseCodeName($code){
		if(in_array($code,self::$_response_code))
			return self::__(array_search($code,sfAtosPaymentBase::$_response_code));
		throw new Exception('Impossible de trouver le code >> '.$code.' << ');
	}
	
	/**
	 * Retourne le texte du bank response code en fonction du bank_response_code
	 *
	 * @access public
	 * @static 
	 * @param integer $code bank_response_code
	 * 
	 * @return string Desciption
	 */
	public static function getBankResponseCodeName($code){
		if(in_array($code,self::$_bank_response_code))
			return self::__(array_search($code,sfAtosPaymentBase::$_bank_response_code));
		throw new Exception('Impossible de trouver le code >> '.$code.' << ');
	}
	
	/**
	 * Test si la transaction est valide
	 *
	 * @access public
	 * @static 
	 * @param integer $code bank_response_code
	 * 
	 * @return boolean true si le paiement et correcte
	 */
	public static function isValidBankResponseCode($bank_response_code){
		return ($bank_response_code=='00');
	}
	
	/**
	 * Traduit un message avec I18N si il est enabled
	 * 
	 * @param string $t chaine a traduire
	 * @param array $args arguments pour strtr
	 * @param string $catalogue catalogue
	 * 
	 * @return string chaine trauite
	 */
	public static function __($t, $args=array(),$catalogue='messages'){
		if(sfConfig::get('sf_i18n'))
			return sfContext::getI18N()->__($t,$args,$catalogue);
		return $t;
	}
	
	/**
	 * Test si le merchant_id est valide
	 * 
	 * @param string %Merchant id
	 * @return boolean true si bon
	 */
	public static function isValidMerchantId($merchant_id){
		return ((strlen($merchant_id)<=15)&&(ereg('^([0-9]+)$',$merchant_id)));
	}
	
	/**
	 * Test si le montant est valide
	 * 
	 * @param mixed $amount montant
	 * @return boolean true si vrai
	 */
	public static function isValidAmount($amount){
	 	return (($amount>0)&&(is_numeric($amount)));
	}
	
	/**
	 * Génère un order_id
	 */
	public static function generateOrderId(){
		return uniqid(rand());
	}
}
?>