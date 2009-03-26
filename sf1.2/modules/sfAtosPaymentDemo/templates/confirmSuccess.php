
<h1>Payement Accepté</h1>
<div>
	<p><b>numéro de la commande :</b><?php echo $sf_atos_cart->OrderId() ?></p>
	<p><b>Montant :</b><?php echo number_format(($sf_atos_cart->getAmount()/100),2,',',' '); ?></p>
	<p><b>Monnaie :</b><?php echo sfAtosPaymentTools::getCurrencyName($sf_atos_cart->getCurrencyCode()) ?></p>
</div>