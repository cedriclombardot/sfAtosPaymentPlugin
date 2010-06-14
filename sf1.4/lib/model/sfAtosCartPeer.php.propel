<?php

class sfAtosCartPeer extends BasesfAtosCartPeer
{
	/**
	 * Retrouve un enregistrement a partir de l'array de la réponse de la banque
	 * @static
	 * @access public
	 * 
	 * @param string $array Array retourner par l'exec de response
	 * 
	 * @return sfAtosCart
	 */
	public static function retrieveByBankResponse($array, PropelPDO $con=null){
		return self::retrieveByOrderId($array[27],$con);
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
	public static function retrieveByOrderId($order_id, PropelPDO $con=null){
		$c=new Criteria(self::DATABASE_NAME);
		$c->add(self::ORDER_ID,$order_id);
		return self::doSelectOne($c,$con);
	}
}
