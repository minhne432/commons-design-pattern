<?php

interface PaymentStrategy
{
  public function pay($amount);
}

class CreditCardPayment implements PaymentStrategy
{
  private $name;
  private $cardNumber;
  private $cvv;
  private $expiryDate;

  public function __construct($name, $cardNumber, $cvv, $expiryDate)
  {
    $this->name = $name;
    $this->cardNumber = $cardNumber;
    $this->cvv = $cvv;
    $this->expiryDate = $expiryDate;
  }

  public function pay($amount)
  {
    echo "Paid $amount using Credit Card. \n";
  }
}

class PayPalPayment implements PaymentStrategy
{
  private $email;
  private $password;

  public function __construct($email, $password)
  {
    $this->email = $email;
    $this->password = $password;
  }

  public function pay($amount)
  {
    echo "Paid $amount using Paypal. \n";
  }
}

class ShoppingCart
{
  private $paymentStrategy;

  public function setPaymentStrategy(PaymentStrategy $paymentStrategy)
  {
    $this->paymentStrategy = $paymentStrategy;
  }

  public function checkout($amount)
  {
    $this->paymentStrategy->pay($amount);
  }
}


$cart = new ShoppingCart();

$creditCardPayment = new CreditCardPayment('John Doe', '413414124242', '123', '7/14');

$cart->setPaymentStrategy($creditCardPayment);

$cart->checkout(1000);

$paypalPayment = new PayPalPayment('email@example.com', 'password123');

$cart->setPaymentStrategy($paypalPayment);

$cart->checkout(2000);
