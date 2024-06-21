<?php

require_once './IPaymentStrategy.php';

class PaypalPayment implements PaymentStrategy
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email;
        $this->password;
    }

    public function pay($amount)
    {
        echo "Paid $amount using Paypal! \n";
    }
}
