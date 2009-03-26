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
	 
}
?>