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
  public function send($recipent, $message)
  {
    echo "Sending email to $recipent: $message\n";
  }
}


class UserService
{
  private $logger;
  private $mailer;

  public function __construct(Logger $logger, Mailer $mailer)
  {
    $this->logger = $logger;
    $this->mailer = $mailer;
  }

  public function registerUser($email)
  {

    //use the logger dependency
    $this->logger->log("User registered with email: $email\n");

    //use the mailer dependency
    $this->mailer->send($email, "Welcome to our service!\n");
  }
}


$logger = new Logger();
$mailer = new Mailer();

$userService = new UserService($logger, $mailer);
$userService->registerUser("user@example.com");
