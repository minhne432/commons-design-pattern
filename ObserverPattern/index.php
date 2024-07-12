<?php

interface Observer
{
  public function update($title, $content);
}

interface Subject
{
  public function registerObserver(Observer $observer);
  public function removeObservers(Observer $observer);
  public function notifyObservers();
}


class NewPublisher implements Subject
{
  private $observers = [];
  private $title;
  private $content;

  public function registerObserver(Observer $observer)
  {
    $this->observers[] = $observer;
  }

  public function removeObservers(Observer $observer)
  {
    $key = array_search($observer, $this->observers);
    if ($key !== false) {
      unset($this->observers[$key]);
    }
  }

  public function notifyObservers()
  {
    foreach ($this->observers as $observer) {
      $observer->update($this->title, $this->content);
    }
  }

  public function publicNews($title, $content)
  {
    $this->title = $title;
    $this->content = $content;
    $this->notifyObservers();
  }
}

class NewSubcriber implements Observer
{
  private $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function update($title, $content)
  {
    echo "Hello {$this->name}, a new article has been published: {$title}\n";
    echo "Content: {$content}\n";
  }
}

$publisher = new NewPublisher();

$subcriber1 = new NewSubcriber("Minh");
$subcriber2 = new NewSubcriber("Ly");

$publisher->registerObserver($subcriber1);
$publisher->registerObserver($subcriber2);

$publisher->publicNews('Breaking News', 'This isthe content of the breaking news');
