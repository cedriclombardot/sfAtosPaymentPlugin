<?php
echo $sf_atos_cart->getBankResponseCode().' - '.sfAtosPaymentTools::getBankResponseCodeName($sf_atos_cart->getBankResponseCode());
?>