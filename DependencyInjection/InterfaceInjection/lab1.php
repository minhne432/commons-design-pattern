<?php

interface LoggerInterface
{
  public function log($message);
}

interface MailerInterface
{
  public function send($recipient, $message);
}


class Logger implements LoggerInterface
{
  public function log($message)
  {
    echo "Log message: $message\n";
  }
}

class Mailer implements MailerInterface
{
  public function send($recipient, $message)
  {
    echo "Sending email to $recipient: $message\n";
  }
}

interface InjectableLogger
{
  public function setLogger(LoggerInterface $logger);
}

interface InjectableMailer
{
  public function setMailer(MailerInterface $mailer);
}


class UserService implements InjectableLogger, InjectableMailer
{
  private $logger;
  private $mailer;

  public function setLogger(LoggerInterface $logger)
  {
    $this->logger = $logger;
  }

  public function setMailer(MailerInterface $mailer)
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

$logger = new Logger();
$mailer = new Mailer();

$userService = new UserService();

$userService->setLogger($logger);
$userService->setMailer($mailer);

$userService->registerUser("user@example.com");
