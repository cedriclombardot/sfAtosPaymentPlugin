<?php
echo $sf_atos_cart->getCvvFlag().' - '.sfAtosPaymentTools::getCvvFlagCodeName($sf_atos_cart->getCvvFlag());
?>