<?php

interface PaymentProcessorInterfac
{
  public function pay($amount);
}

class NewPaymentGateway
{
  public function makePayment($amount)
  {
    echo "Payment of $amount processed using the new payment gateway\n";
  }
}

class PaymentGatewayAdapter implements PaymentProcessorInterfac
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


function processPayment(PaymentProcessorInterfac $paymentProcessor, $amount)
{
  $paymentProcessor->pay($amount);
}


// use the Adapter in the client code
$newPaymentGateway = new NewPaymentGateway();

$adapter = new PaymentGatewayAdapter($newPaymentGateway);

processPayment($adapter, 1000);
