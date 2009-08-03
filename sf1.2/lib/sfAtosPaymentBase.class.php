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
	public static $_languages = array('fr', 'be', 'de', 'it', 'es', 'en');

	/** @staticvar Liste les monnaies afin de rendre plus lisible la config */
	public static $_currencies = array(
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
 	public static $_cvv_flag_code = array(
 	    '0' => 'Le numéro de contrôle n’est pas remonté par le commerçant',
 	    '1' => 'Le numéro de contrôle est présent',
 	    '2' => 'Le numéro de contrôle est présent sur la carte du porteur mais illisible
(uniquement pour les cartes CB, VISA et MASTERCARD)',
 	    '9' => 'Le porteur a informé le commerçant que le numéro de contrôle
 n’était pas imprimé sur sa carte (uniquement pour les cartes CB, VISA, MASTERCARD et FINAREF)'
 	  );


 	/** @staticvar Code de retour de verification du CVV flag */
 	public static $_cvv_verification_code = array(
 	    '4E' => 'Numéro de contrôle incorrect',
 	    '4D' => 'Numéro de contrôle correct',
 	    '50' => 'Numéro de contrôle non traité',
 	    '53' => 'Le numéro de contrôle est absent de la demande d’autorisation',
 	    '55' => 'La banque de l’internaute n’est pas certifiée, le contrôle n’a pu être effectué.',
 	    'NO' => 'Pas de cryptogramme sur la carte.',
 		'??' => '??'
    );

    /**  @staticvar code de réponse */
    public static $_response_code = array(
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
 	  public static $_bank_response_code = array(
 	   '00' =>    'Autorisation acceptée',
 	   '02' =>    'Demande d’autorisation par téléphone à la banque à cause d’un dépassement de plafond d’autorisation sur la carte (cf. annexe I)',
	   '03' =>    'Champ merchant_id invalide, vérifier la valeur renseignée dans la requête<br />Contrat de vente à distance inexistant, contacter votre banque.',
 	   '05' =>    'Autorisation refusée',
 	   '12' =>    'Transaction invalide, vérifier les paramètres transférés dans la requête.',
 	   '17' =>    'Annulation de l’internaute',
	   '30' =>    'Erreur de format.',
	   '34' =>    'Suspicion de fraude',
 	   '75' =>    'Nombre de tentatives de saisie du numéro de carte dépassé.',
 	   '59' =>	  'Code inconnu - 59',
 	   '' =>	  'Code inconnu',
 	   '90' =>    'Service temporairement indisponible'
 	  );

 	 /** @staticvar  Liste des codes compémentaires */
 	  public static $_complementary_codes =array(
 	  	''=> 'Pas de contrôle effectué',
 	  	'00'=>'Tous les contrôles auxquels vous avez adhérés se sont effectués avec succès',
 	  	'02'=>'La carte utilisée a dépassé l’encours autorisé',
 	  	'03'=>'La carte utilisée appartient à la « liste grise » du commerçant',
 	  	'05'=>'le BIN de la carte utilisée appartient à une plage non référencée dans la table des BIN de la plate-forme MERCANET',
 	  	'06'=>'le numéro de carte n\'est pas dans une plage de même nationalité que celle du commerçant',
 	  	'99'=>'le serveur MERCANET a un rencontré un problème lors du traitement d\'un des contrôles locaux complémentaires',
 	  );


}
?>