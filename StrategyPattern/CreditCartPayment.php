<?php

require_once './IPaymentStrategy.php';

class CreditCartPayment implements PaymentStrategy
{
    private $name;
    private $cartNumber;
    private $cvv;
    private $expiryDate;

    public function __construct($name, $cartNumber, $cvv, $expiryDate)
    {
        $this->name = $name;
        $this->cartNumber = $cartNumber;
        $this->cvv = $cvv;
        $this->expiryDate = $expiryDate;
    }


    public function pay($amount)
    {
        echo "Paid $amount using Credit cart! \n";
    }
}
