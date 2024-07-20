<?php

interface Prototype
{
  public function __clone();
}

class Book implements Prototype
{
  private $title;
  private $author;

  public function __construct($title, $author)
  {
    $this->title = $title;
    $this->author = $author;
  }

  public function setTitile($title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function __clone()
  {
  }
}

$originalBook = new Book("1984", "George Orwell");

$clonedBook = clone $originalBook;

$clonedBook->setTitile("Animal Farm");

print_r($clonedBook);
