<?php
/**
 * @author Cédric Lombardot <cedric.lombardot@spyrit.net>
 * @see http://symfony.spyrit.net
 * @package sfAtosPaymentPlugin
 * @subpackage sfAtosPaymentTask
 * @version sf1.2 - 0.1
 * 
 * Task pour réécrire le pathfile
 */

class sfAtosPaymentTask extends sfPluginBaseTask{
	
	protected function configure(){
		/*	$this->addArguments(array(
	    ));
		$this->addOptions(
		array(		));
	
		*/
		
		
    	$this->namespace = 'atos';
   		$this->name = 'pathfile';
   		
   		$this->briefDescription = 'create the pathfile from config';
   		
   		$this->detailedDescription = <<<EOF
   		This plugin will generate your path file from the app.yml   		
   		
EOF;

	}
	
  protected function execute($arguments = array(), $options = array())
  {
 		  		
  }
}

?>