<?php
echo $sf_atos_cart->getComplementaryCode().' - '.sfAtosPaymentTools::getComplementaryCodeName($sf_atos_cart->getComplementaryCode());
?>