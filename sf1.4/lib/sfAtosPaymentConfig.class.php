<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPaymentConfig
 * @version sf1.2 - 0.1
 * 
 * Cette classe gere la config du app.yml
 * 
 * 
 */

class sfAtosPaymentConfig{
	
	/**
	 * Retrouve la variable dans sfConfig
	 * 
	 * @access public
	 * @static 
	 * @param string $var nom de la variable
	 * @param mixed $default Valeur si null
	 * 
	 * @return mixed valeur de app.yml
	 */
	public static function get($var, $default=null){
		return sfConfig::get('app_sfAtosPaymentPlugin_'.$var,$default);
	}
	
	
	/**
	 * Retrouve la variable dans sfConfig
	 * 
	 * @access public
	 * @static 
	 * @param string $var nom de la variable
	 * @param mixed $default Valeur si null
	 * 
	 * @return array valeur de app_sfAtosPaymentPlugin
	 */
	public static function getAll(){
		return sfConfig::get('app_sfAtosPaymentPlugin');
	}
	
	
	
	
}

?>