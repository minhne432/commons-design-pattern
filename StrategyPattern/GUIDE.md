The Strategy Pattern is a behavioral design pattern that enables selecting an algorithm's behavior at runtime. It defines a family of algorithms, encapsulates each one, and makes them interchangeable. This pattern is useful for implementing different methods for performing a specific task without changing the code that uses the methods.

### Step-by-Step Implementation of the Strategy Pattern in PHP

1. **Define the Strategy Interface:**
   Define an interface for the strategy that declares a method common to all supported algorithms.

2. **Create Concrete Strategy Classes:**
   Implement different versions of the algorithm by creating classes that implement the strategy interface.

3. **Create a Context Class:**
   This class uses a strategy and provides a method to set the strategy at runtime. It delegates the work to the strategy object.

### Example: Payment Processing System

Let's create an example where we have different payment methods (strategies) that can be selected at runtime.

#### Step 1: Define the Strategy Interface

```php
<?php
interface PaymentStrategy {
    public function pay($amount);
}
?>
```

#### Step 2: Create Concrete Strategy Classes

```php
<?php
class CreditCardPayment implements PaymentStrategy {
    private $name;
    private $cardNumber;
    private $cvv;
    private $expiryDate;

    public function __construct($name, $cardNumber, $cvv, $expiryDate) {
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->cvv = $cvv;
        $this->expiryDate = $expiryDate;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card.\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function pay($amount) {
        echo "Paid $amount using PayPal.\n";
    }
}
?>
```

#### Step 3: Create the Context Class

```php
<?php
class ShoppingCart {
    private $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function checkout($amount) {
        $this->paymentStrategy->pay($amount);
    }
}
?>
```

#### Step 4: Use the Strategy Pattern

```php
<?php
require_once 'PaymentStrategy.php';
require_once 'CreditCardPayment.php';
require_once 'PayPalPayment.php';
require_once 'ShoppingCart.php';

// Create a shopping cart
$cart = new ShoppingCart();

// Set payment strategy to Credit Card
$creditCardPayment = new CreditCardPayment('John Doe', '1234567890123456', '123', '12/23');
$cart->setPaymentStrategy($creditCardPayment);
$cart->checkout(100); // Output: Paid 100 using Credit Card.

// Set payment strategy to PayPal
$paypalPayment = new PayPalPayment('john.doe@example.com', 'password123');
$cart->setPaymentStrategy($paypalPayment);
$cart->checkout(200); // Output: Paid 200 using PayPal.
?>
```

### Full Example

Here’s the complete code in one place for clarity:

**PaymentStrategy.php:**

```php
<?php
interface PaymentStrategy {
    public function pay($amount);
}
?>
```

**CreditCardPayment.php:**

```php
<?php
require_once 'PaymentStrategy.php';

class CreditCardPayment implements PaymentStrategy {
    private $name;
    private $cardNumber;
    private $cvv;
    private $expiryDate;

    public function __construct($name, $cardNumber, $cvv, $expiryDate) {
        $this->name = $name;
        $this->cardNumber = $cardNumber;
        $this->cvv = $cvv;
        $this->expiryDate = $expiryDate;
    }

    public function pay($amount) {
        echo "Paid $amount using Credit Card.\n";
    }
}
?>
```

**PayPalPayment.php:**

```php
<?php
require_once 'PaymentStrategy.php';

class PayPalPayment implements PaymentStrategy {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function pay($amount) {
        echo "Paid $amount using PayPal.\n";
    }
}
?>
```

**ShoppingCart.php:**

```php
<?php
class ShoppingCart {
    private $paymentStrategy;

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function checkout($amount) {
        $this->paymentStrategy->pay($amount);
    }
}
?>
```

**index.php:**

```php
<?php
require_once 'CreditCardPayment.php';
require_once 'PayPalPayment.php';
require_once 'ShoppingCart.php';

// Create a shopping cart
$cart = new ShoppingCart();

// Set payment strategy to Credit Card
$creditCardPayment = new CreditCardPayment('John Doe', '1234567890123456', '123', '12/23');
$cart->setPaymentStrategy($creditCardPayment);
$cart->checkout(100); // Output: Paid 100 using Credit Card.

// Set payment strategy to PayPal
$paypalPayment = new PayPalPayment('john.doe@example.com', 'password123');
$cart->setPaymentStrategy($paypalPayment);
$cart->checkout(200); // Output: Paid 200 using PayPal.
?>
```

This implementation demonstrates how the Strategy Pattern can be used to create a flexible payment processing system where different payment methods can be selected at runtime.
