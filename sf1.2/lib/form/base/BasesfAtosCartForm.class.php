<?php

/**
 * sfAtosCart form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BasesfAtosCartForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'amount'              => new sfWidgetFormInput(),
      'merchant_id'         => new sfWidgetFormInput(),
      'merchant_language'   => new sfWidgetFormInput(),
      'merchant_country'    => new sfWidgetFormInput(),
      'transaction_id'      => new sfWidgetFormInput(),
      'payment_means'       => new sfWidgetFormInput(),
      'transmission_date'   => new sfWidgetFormDateTime(),
      'payment_time'        => new sfWidgetFormDateTime(),
      'response_code'       => new sfWidgetFormInput(),
      'payment_certificate' => new sfWidgetFormInput(),
      'authorisation_id'    => new sfWidgetFormInput(),
      'currency_code'       => new sfWidgetFormInput(),
      'card_number'         => new sfWidgetFormInput(),
      'cvv_flag'            => new sfWidgetFormInput(),
      'cvv_response_code'   => new sfWidgetFormInput(),
      'bank_response_code'  => new sfWidgetFormInput(),
      'complementary_code'  => new sfWidgetFormInput(),
      'complementary_info'  => new sfWidgetFormInput(),
      'return_context'      => new sfWidgetFormInput(),
      'caddie'              => new sfWidgetFormTextarea(),
      'language'            => new sfWidgetFormInput(),
      'customer_id'         => new sfWidgetFormInput(),
      'order_id'            => new sfWidgetFormInput(),
      'customer_email'      => new sfWidgetFormInput(),
      'customer_ip_address' => new sfWidgetFormInput(),
      'capture_day'         => new sfWidgetFormInput(),
      'capture_mode'        => new sfWidgetFormInput(),
      'data'                => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'sfAtosCart', 'column' => 'id', 'required' => false)),
      'amount'              => new sfValidatorInteger(),
      'merchant_id'         => new sfValidatorString(array('max_length' => 15)),
      'merchant_language'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'merchant_country'    => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'transaction_id'      => new sfValidatorInteger(),
      'payment_means'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'transmission_date'   => new sfValidatorDateTime(),
      'payment_time'        => new sfValidatorDateTime(array('required' => false)),
      'response_code'       => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'payment_certificate' => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'authorisation_id'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'currency_code'       => new sfValidatorInteger(),
      'card_number'         => new sfValidatorString(array('max_length' => 7, 'required' => false)),
      'cvv_flag'            => new sfValidatorInteger(array('required' => false)),
      'cvv_response_code'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'bank_response_code'  => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'complementary_code'  => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'complementary_info'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'return_context'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'caddie'              => new sfValidatorString(array('required' => false)),
      'language'            => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'customer_id'         => new sfValidatorString(array('max_length' => 19)),
      'order_id'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'customer_email'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'customer_ip_address' => new sfValidatorString(array('max_length' => 19, 'required' => false)),
      'capture_day'         => new sfValidatorInteger(array('required' => false)),
      'capture_mode'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'data'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'sfAtosCart', 'column' => array('transaction_id'))),
        new sfValidatorPropelUnique(array('model' => 'sfAtosCart', 'column' => array('authorisation_id'))),
        new sfValidatorPropelUnique(array('model' => 'sfAtosCart', 'column' => array('order_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_atos_cart[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfAtosCart';
  }


}
