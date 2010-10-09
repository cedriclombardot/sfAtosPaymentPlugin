<?php

/**
 * Pluginsf_atos_cartTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Pluginsf_atos_cartTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object Pluginsf_atos_cartTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Pluginsf_atos_cart');
    }
    
	/**
	 * Retrouve un enregistrement a partir de l'array de la réponse de la banque
	 * @static
	 * @access public
	 * 
	 * @param string $array Array retourner par l'exec de response
	 * 
	 * @return sfAtosCart
	 */
	public static function retrieveByBankResponse($array){
		return self::retrieveByOrderId($array[27]);
	}
	
	/**
	 * Retrieve the sfAtosCart with the order id
	 * @static
	 * @access public
	 * 
	 * @param string $order_id Numéro de la commande
	 * 
	 * @return sfAtosCart
	 */
	public static function retrieveByOrderId($order_id){
		return Doctrine_Core::getTable('sf_atos_cart')
		->createQuery('a')
		->where('order_id=?',$order_id)
		->fetchOne();
	}
    
    
}