<?php

class Logger
{
  public function log($message)
  {
    echo "Log message: $message\n";
  }
}


class Mailer
{
  public function send($recipient, $message)
  {
    echo "Sending email to $recipient: $message\n";
  }
}


class UserService
{
  private $logger;
  private $mailer;

  public function setLogger(Logger $logger)
  {
    $this->logger = $logger;
  }

  public function setMailer(Mailer $mailer)
  {
    $this->mailer = $mailer;
  }

  public function registerUser($email)
  {
    if ($this->logger) {
      $this->logger->log("User registered with email: $email");
    }

    if ($this->mailer) {
      $this->mailer->send($email, "Welcome to our service!");
    }
  }
}



$userService = new UserService();

$logger = new Logger();
$mailer = new Mailer();

$userService->setLogger($logger);
$userService->setMailer($mailer);

$userService->registerUser("user@example.com");
