Interface Injection is a less common form of Dependency Injection where the dependency is injected through an interface. This method allows the class to receive its dependencies by implementing an interface that specifies a setter method for the dependency.

### Step-by-Step Guide to Implement Interface Injection

#### Step 1: Define the Dependency Interfaces

First, define the interfaces for the dependencies.

```php
interface LoggerInterface {
    public function log($message);
}

interface MailerInterface {
    public function send($recipient, $message);
}
```

#### Step 2: Define the Implementations for Dependencies

Next, create the concrete implementations of these interfaces.

```php
class Logger implements LoggerInterface {
    public function log($message) {
        echo "Log message: $message\n";
    }
}

class Mailer implements MailerInterface {
    public function send($recipient, $message) {
        echo "Sending email to $recipient: $message\n";
    }
}
```

#### Step 3: Define the Interface for Dependency Injection

Create an interface that defines the methods for setting the dependencies.

```php
interface InjectableLogger {
    public function setLogger(LoggerInterface $logger);
}

interface InjectableMailer {
    public function setMailer(MailerInterface $mailer);
}
```

#### Step 4: Implement the Class that Requires Dependencies

The class will implement these injectable interfaces and their setter methods.

```php
class UserService implements InjectableLogger, InjectableMailer {
    private $logger;
    private $mailer;

    public function setLogger(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function setMailer(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }

    public function registerUser($email) {
        // Business logic for user registration

        // Use the logger dependency if available
        if ($this->logger) {
            $this->logger->log("User registered with email: $email");
        }

        // Use the mailer dependency if available
        if ($this->mailer) {
            $this->mailer->send($email, "Welcome to our service!");
        }
    }
}
```

#### Step 5: Inject Dependencies through the Interfaces

Finally, instantiate the dependencies and inject them through the interfaces.

```php
// Instantiate dependencies
$logger = new Logger();
$mailer = new Mailer();

// Instantiate UserService
$userService = new UserService();

// Inject dependencies via interface methods
$userService->setLogger($logger);
$userService->setMailer($mailer);

// Use the service
$userService->registerUser("user@example.com");
```

### Full Code Example

Here’s the complete code for clarity:

```php
<?php

// Dependency Interfaces
interface LoggerInterface {
    public function log($message);
}

interface MailerInterface {
    public function send($recipient, $message);
}

// Dependency Implementations
class Logger implements LoggerInterface {
    public function log($message) {
        echo "Log message: $message\n";
    }
}

class Mailer implements MailerInterface {
    public function send($recipient, $message) {
        echo "Sending email to $recipient: $message\n";
    }
}

// Injectable Interfaces
interface InjectableLogger {
    public function setLogger(LoggerInterface $logger);
}

interface InjectableMailer {
    public function setMailer(MailerInterface $mailer);
}

// Class that requires dependencies
class UserService implements InjectableLogger, InjectableMailer {
    private $logger;
    private $mailer;

    public function setLogger(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function setMailer(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }

    public function registerUser($email) {
        // Business logic for user registration

        // Use the logger dependency if available
        if ($this->logger) {
            $this->logger->log("User registered with email: $email");
        }

        // Use the mailer dependency if available
        if ($this->mailer) {
            $this->mailer->send($email, "Welcome to our service!");
        }
    }
}

// Instantiate dependencies
$logger = new Logger();
$mailer = new Mailer();

// Instantiate UserService
$userService = new UserService();

// Inject dependencies via interface methods
$userService->setLogger($logger);
$userService->setMailer($mailer);

// Use the service
$userService->registerUser("user@example.com");

?>
```

### Explanation

1. **LoggerInterface and MailerInterface**: Define the interfaces for the logger and mailer dependencies.
2. **Logger and Mailer**: Provide concrete implementations of these interfaces.
3. **InjectableLogger and InjectableMailer**: Define the interfaces for injecting the logger and mailer dependencies.
4. **UserService**: Implements `InjectableLogger` and `InjectableMailer` and provides the setter methods to inject the dependencies.
5. **Client Code**: Instantiates the dependencies and the `UserService`, and injects the dependencies using the setter methods defined in the injectable interfaces.

### Benefits of Interface Injection

- **Decoupling**: The class is decoupled from the concrete implementations of its dependencies.
- **Flexibility**: Dependencies can be easily swapped or updated.
- **Testing**: Makes it easier to mock dependencies in unit tests.

Interface Injection is a powerful technique that promotes loose coupling and enhances the flexibility and maintainability of your code. It is especially useful in larger applications where dependency management can become complex.
