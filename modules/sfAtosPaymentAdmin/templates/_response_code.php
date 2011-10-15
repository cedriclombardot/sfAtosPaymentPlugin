<?php
echo $sf_atos_cart->getResponseCode().' - '.sfAtosPaymentTools::getBankResponseCodeName($sf_atos_cart->getResponseCode());
?>