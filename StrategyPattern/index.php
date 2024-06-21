<?php

require './ShoppingCart.php';
require './CreditCartPayment.php';
require './PaypalPayment.php';

$cart = new ShoppingCart();

$creditCartPayment = new CreditCartPayment("Minh", "616597356523653", "333", "25/12");
$cart->setPaymentStrategy($creditCartPayment); //setter
$cart->checkout(3000);


$paypalCartPayment = new PaypalPayment("nh.minh0403@gmail.com", "password");
$cart->setPaymentStrategy($paypalCartPayment); //setter
$cart->checkout(2000);
