<h1>Payement Refusé</h1>
<div>
	<p><b>Numéro de la commande :</b><?php echo $sf_atos_cart->OrderId() ?></p>
	<p><b>Montant :</b><?php echo number_format(($sf_atos_cart->getAmount()/100),2,',',' '); ?></p>
	<p><b>Monnaie :</b><?php echo sfAtosPaymentTools::getCurrencyName($sf_atos_cart->getCurrencyCode()) ?></p>
	<p><b>Erreur : </b><?php echo sfAtosPaymentTools::getBankResponseCodeName($sf_atos_cart->getBankResponseCode()) ?></p>
	<p><?php echo sfAtosPaymentTools::getResponseCodeName($sf_atos_cart->getResponseCode()) ?></p>
</div>