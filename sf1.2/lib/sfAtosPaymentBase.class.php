<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPaymentBase
 * @version sf1.2 - 0.1
 * 
 * Cette classe gère les variables des langues pour les paiements en ligne pour la 
 * plupat des banques francaises
 * 
 * @see Inspiré de sfPaymentSIPSPlugin/modules/sfPaymentSIPS/lib/sfPaymentSIPS.class.php
 * 
 */

abstract class sfAtosPaymentBase{
	
	/** @staticvar Liste les langues utilisables par le modules ATOS */
	private static $_languages = array('fr', 'be', 'de', 'it', 'es', 'en');
	
	/** @staticvar Liste les monnaies afin de rendre plus lisible la config */
	private static $_currencies = array(
	    'EUR' => 978,
 	    'USD' => 840,
 	    'CHF' => 756,
 	    'GBP' => 826,
 	    'CAD' => 124,
 	    'JPY' => 392,
	    'MXN' => 484,
 	    'TRY' => 949,
 	    'AUD' => 036,
 	    'NZD' => 554,
 	    'NOK' => 578,
 	    'BRL' => 986,
 	    'ARS' => 032,
 	    'KHR' => 116,
 	    'TWD' => 901,
 	    'SEK' => 752,
 	    'DKK' => 208,
 	    'KRW' => 410,
 	    'SGD' => 702,
	    'XPF' => 953,
 	    'WAF' => 952
 	  );
 	
 	  /** @staticvar Liste des retours sur les CVV flag (chiffres derrières la carte */
 	private static $_cvv_flag_code = array(
 	    '0' => 'Le numéro de contrôle n’est pas remonté par le commerçant',
 	    '1' => 'Le numéro de contrôle est présent',
 	    '2' => 'Le numéro de contrôle est présent sur la carte du porteur mais illisible 
(uniquement pour les cartes CB, VISA et MASTERCARD)',
 	    '9' => 'Le porteur a informé le commerçant que le numéro de contrôle
 n’était pas imprimé sur sa carte (uniquement pour les cartes CB, VISA, MASTERCARD et FINAREF)'
 	  );
 	  
 	
 	/** @staticvar Code de retour de verification du CVV flag */ 
 	private static $_cvv_verification_code = array(
 	    '4E' => 'Numéro de contrôle incorrect',
 	    '4D' => 'Numéro de contrôle correct',
 	    '50' => 'Numéro de contrôle non traité',
 	    '53' => 'Le numéro de contrôle est absent de la demande d’autorisation',
 	    '55' => 'La banque de l’internaute n’est pas certifiée, le contrôle n’a pu être effectué.',
 	    'NO' => 'Pas de cryptogramme sur la carte.'
    );
    
    /**  @staticvar code de réponse */
    private static $_response_code = array(
 	    '00' => 'Transaction approuvée ou traitée avec succès',
 	    '02' => 'Contacter l’émetteur de carte',
 	    '03' => 'Accepteur invalide',
 	    '04' => 'Conserver la carte',
 	    '05' => 'Ne pas honorer',
 	    '07' => 'Conserver la carte, conditions spéciales',
	    '08' => 'Approuver après identification',
 	    '12' => 'Transaction invalide',
	    '13' => 'Montant invalide',
 	    '14' => 'Numéro de porteur invalide',
 	    '15' => 'Emetteur de carte inconnu',
 	    '30' => 'Erreur de format',
 	    '31' => 'Identifiant de l’organisme acquéreur inconnu',
 	    '33' => 'Date de validité de la carte dépassée',
 	    '34' => 'Suspicion de fraude',
 	    '41' => 'Carte perdue',
 	    '43' => 'Carte volée',
 	    '51' => 'Provision insuffisante ou crédit dépassé',
 	    '54' => 'Date de validité de la carte dépassée',
 	    '56' => 'Carte absente du fichier',
 	    '57' => 'Transaction non permise à ce porteur',
 	    '58' => 'Transaction interdite au terminal',
 	    '59' => 'Suspicion de fraude',
 	    '60' => 'L’accepteur de carte doit contacter l’acquéreur',
 	    '61' => 'Dépasse la limite du montant de retrait',
 	    '63' => 'Règles de sécurité non respectées',
 	    '68' => 'Réponse non parvenue ou reçue trop tard',
 	    '90' => 'Arrêt momentané du système',
 	    '91' => 'Emetteur de cartes inaccessible',
 	    '96' => 'Mauvais fonctionnement du système',
 	    '97' => 'Échéance de la temporisation de surveillance globale',
 	    '98' => 'Serveur indisponible routage réseau demandé à nouveau',
 	    '99' => 'Incident domaine initiateur',
 	  );
 	  
 	  /**  @staticvar code de reponse de SPIS */
 	  private static $_bank_response_code = array(
 	   '00' =>    'Autorisation acceptée',
 	   '02' =>    'Demande d’autorisation par téléphone à la banque à cause d’un dépassement de plafond d’autorisation sur la carte (cf. annexe I)',
	   '03' =>    'Champ merchant_id invalide, vérifier la valeur renseignée dans la requête<br />Contrat de vente à distance inexistant, contacter votre banque.',
 	   '05' =>    'Autorisation refusée',
 	   '12' =>    'Transaction invalide, vérifier les paramètres transférés dans la requête.',
 	   '17' =>    'Annulation de l’internaute',
	   '30' =>    'Erreur de format.',
	   '34' =>    'Suspicion de fraude',
 	   '75' =>    'Nombre de tentatives de saisie du numéro de carte dépassé.',
 	   '90' =>    'Service temporairement indisponible'
 	  );
 	
 	 
	 
	 
}
?>