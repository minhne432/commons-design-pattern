<?php

interface PaymentProcessorInterface
{
  public function pay($amount);
}

class NewPaymentGateway
{
  public function makePayment($amount)
  {
    echo "Payment of $amount processed using the new payment gateway.\n";
  }
}

class PaymentGatewayAdapter implements PaymentProcessorInterface
{

  private $newPaymentGateway;

  public function __construct(NewPaymentGateway $newPaymentGateway)
  {
    $this->newPaymentGateway = $newPaymentGateway;
  }

  public function pay($amount)
  {
    $this->newPaymentGateway->makePayment($amount);
  }
}



$newPaymentGateway = new NewPaymentGateway();
$adapter = new PaymentGatewayAdapter($newPaymentGateway);
$adapter->pay(3000);
