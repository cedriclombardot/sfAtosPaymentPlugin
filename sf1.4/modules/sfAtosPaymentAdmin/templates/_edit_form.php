<?php echo form_tag('sfAtosPaymentAdmin/list', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<style>
<!--
#sf_admin_container .form-row{
border:0;
}
-->
</style>
<?php echo object_input_hidden_tag($sf_atos_cart, 'getId') ?>

<fieldset id="sf_fieldset_le_commercant" class="">
<h2><?php echo __('Le commercant') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[merchant_id]', __($labels['sf_atos_cart{merchant_id}']), ' ') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{merchant_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{merchant_id}')): ?>
    <?php echo form_error('sf_atos_cart{merchant_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
	
  <?php echo $sf_atos_cart->getMerchantId() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[merchant_country]', __($labels['sf_atos_cart{merchant_country}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{merchant_country}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{merchant_country}')): ?>
    <?php echo form_error('sf_atos_cart{merchant_country}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
	<?php echo $sf_atos_cart->getMerchantCountry() ?>

    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[merchant_language]', __($labels['sf_atos_cart{merchant_language}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{merchant_language}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{merchant_language}')): ?>
    <?php echo form_error('sf_atos_cart{merchant_language}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getMerchantLanguage() ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_l__achat" class="">
<h2><?php echo __('L\'achat') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[order_id]', __($labels['sf_atos_cart{order_id}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{order_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{order_id}')): ?>
    <?php echo form_error('sf_atos_cart{order_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getOrderId() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[amount]', __($labels['sf_atos_cart{amount}']), ' ') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{amount}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{amount}')): ?>
    <?php echo form_error('sf_atos_cart{amount}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('amount', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[currency_code]', __($labels['sf_atos_cart{currency_code}']), ' ') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{currency_code}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{currency_code}')): ?>
    <?php echo form_error('sf_atos_cart{currency_code}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('currency_code', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[return_context]', __($labels['sf_atos_cart{return_context}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{return_context}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{return_context}')): ?>
    <?php echo form_error('sf_atos_cart{return_context}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getReturnContext() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[caddie]', __($labels['sf_atos_cart{caddie}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{caddie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{caddie}')): ?>
    <?php echo form_error('sf_atos_cart{caddie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCaddie() ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_la_transaction" class="">
<h2><?php echo __('La transaction') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[transaction_id]', __($labels['sf_atos_cart{transaction_id}']), ' ') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{transaction_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{transaction_id}')): ?>
    <?php echo form_error('sf_atos_cart{transaction_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getTransactionId() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[transmission_date]', __($labels['sf_atos_cart{transmission_date}']), ' ') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{transmission_date}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{transmission_date}')): ?>
    <?php echo form_error('sf_atos_cart{transmission_date}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getTransmissionDate() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[payment_time]', __($labels['sf_atos_cart{payment_time}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{payment_time}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{payment_time}')): ?>
    <?php echo form_error('sf_atos_cart{payment_time}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getPaymentTime() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[response_code]', __($labels['sf_atos_cart{response_code}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{response_code}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{response_code}')): ?>
    <?php echo form_error('sf_atos_cart{response_code}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('response_code', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[payment_certificate]', __($labels['sf_atos_cart{payment_certificate}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{payment_certificate}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{payment_certificate}')): ?>
    <?php echo form_error('sf_atos_cart{payment_certificate}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getPaymentCertificate() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[authorisation_id]', __($labels['sf_atos_cart{authorisation_id}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{authorisation_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{authorisation_id}')): ?>
    <?php echo form_error('sf_atos_cart{authorisation_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getAuthorisationId() ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_la_carte" class="">
<h2><?php echo __('La carte') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[payment_means]', __($labels['sf_atos_cart{payment_means}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{payment_means}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{payment_means}')): ?>
    <?php echo form_error('sf_atos_cart{payment_means}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getPaymentMeans() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[card_number]', __($labels['sf_atos_cart{card_number}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{card_number}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{card_number}')): ?>
    <?php echo form_error('sf_atos_cart{card_number}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCardNumber() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[cvv_flag]', __($labels['sf_atos_cart{cvv_flag}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{cvv_flag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{cvv_flag}')): ?>
    <?php echo form_error('sf_atos_cart{cvv_flag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('cvv_flag', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[cvv_response_code]', __($labels['sf_atos_cart{cvv_response_code}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{cvv_response_code}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{cvv_response_code}')): ?>
    <?php echo form_error('sf_atos_cart{cvv_response_code}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('cvv_response_code', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_paiment_diff__r__" class="">
<h2><?php echo __('Paiment différé') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[capture_day]', __($labels['sf_atos_cart{capture_day}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{capture_day}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{capture_day}')): ?>
    <?php echo form_error('sf_atos_cart{capture_day}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCaptureDay() ?>
  
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[capture_mode]', __($labels['sf_atos_cart{capture_mode}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{capture_mode}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{capture_mode}')): ?>
    <?php echo form_error('sf_atos_cart{capture_mode}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCaptureMode() ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_r__ponse_de_la_banque" class="">
<h2><?php echo __('Réponse de la banque') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[bank_response_code]', __($labels['sf_atos_cart{bank_response_code}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{bank_response_code}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{bank_response_code}')): ?>
    <?php echo form_error('sf_atos_cart{bank_response_code}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('bank_response_code', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[complementary_code]', __($labels['sf_atos_cart{complementary_code}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{complementary_code}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{complementary_code}')): ?>
    <?php echo form_error('sf_atos_cart{complementary_code}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('complementary_code', array('type' => 'edit', 'sf_atos_cart' => $sf_atos_cart)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[complementary_info]', __($labels['sf_atos_cart{complementary_info}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{complementary_info}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{complementary_info}')): ?>
    <?php echo form_error('sf_atos_cart{complementary_info}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getComplementaryInfo() ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_le_client" class="">
<h2><?php echo __('Le client') ?></h2>


<div class="form-row">
  <?php echo label_for('sf_atos_cart[customer_id]', __($labels['sf_atos_cart{customer_id}']), ' ') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{customer_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{customer_id}')): ?>
    <?php echo form_error('sf_atos_cart{customer_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCustomerId() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[language]', __($labels['sf_atos_cart{language}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{language}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{language}')): ?>
    <?php echo form_error('sf_atos_cart{language}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getLanguage() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[customer_email]', __($labels['sf_atos_cart{customer_email}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{customer_email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{customer_email}')): ?>
    <?php echo form_error('sf_atos_cart{customer_email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCustomerEmail() ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('sf_atos_cart[customer_ip_address]', __($labels['sf_atos_cart{customer_ip_address}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('sf_atos_cart{customer_ip_address}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('sf_atos_cart{customer_ip_address}')): ?>
    <?php echo form_error('sf_atos_cart{customer_ip_address}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo $sf_atos_cart->getCustomerIpAddress() ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('sf_atos_cart' => $sf_atos_cart)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
