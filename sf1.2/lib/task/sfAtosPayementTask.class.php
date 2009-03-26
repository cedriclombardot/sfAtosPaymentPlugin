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

require_once sfConfig::get('sf_plugins_dir').'/sfAtosPaymentPlugin/lib/sfAtosPaymentConfig.class.php';

class sfAtosPaymentTask extends sfPluginBaseTask{
	
	protected function configure(){
		$this->addArguments(array(
      new sfCommandArgument('application', sfCommandArgument::REQUIRED, 'The application name'),
    ));

    $this->addOptions(array(
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    ));
		
		
    	$this->namespace = 'atos';
   		$this->name = 'pathfile';
   		
   		$this->briefDescription = 'create the pathfile from config';
   		
   		$this->detailedDescription = <<<EOF
   		This plugin will generate your path file from the app.yml   		
   		
EOF;

	}
	
  protected function execute($arguments = array(), $options = array())
  {
  	
  	$configuration = ProjectConfiguration::getApplicationConfiguration($arguments['application'], $options['env'], true);
  	 
 	$dir=sfAtosPaymentConfig::get('pathfile',sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'sfAtosPaymentPlugin'.DIRECTORY_SEPARATOR.'atos');
 	$fp=fopen($dir.DIRECTORY_SEPARATOR.'pathfile','w');
 	
 	$debug=sfAtosPaymentConfig::get('debug',false);
 	fputs($fp,'DEBUG!'.(($debug)?'YES':'NO').'!
');
 	fputs($fp,'D_LOGO!'.sfAtosPaymentConfig::get('d_logo','/sfAtosPaymentPlugin/logos/').'!
');
 	fputs($fp,'F_CERTIFICATE!'.sfAtosPaymentConfig::get('f_certificate',$dir.'/cerif').'!
');
 	fputs($fp,'F_PARAM!'.sfAtosPaymentConfig::get('f_param',$dir.'/parcom').'!
');
 	fputs($fp,'F_DEFAULT!'.sfAtosPaymentConfig::get('f_param',$dir.'/'.sfAtosPaymentConfig::get('f_default_name')).'!
');
 	
 	fclose($fp);
 	echo 'Fichier '.$dir.DIRECTORY_SEPARATOR.'pathfile ecrit';
  }
}

?>