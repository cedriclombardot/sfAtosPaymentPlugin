<?php
echo $sf_atos_cart->getCvvResponseCode().' - '.sfAtosPaymentTools::getCvvVerificationCodeName($sf_atos_cart->getCvvResponseCode());
?>