<?php

require_once './ISubject.php';
require_once './IObserver.php';
require_once './NewsPublisher.php';
require_once './NewSubcriber.php';


//create a new publisher
$publisher = new NewsPublisher();


//create new subcribers
$subcriber1 = new NewSubcriber("Minh");
$subcriber2 = new NewSubcriber("Ly");


//register subcriber
$publisher->registerObserver($subcriber1);
$publisher->registerObserver($subcriber2);

//publish news
$publisher->publishNews("Breaking news", "This is the content of the breaking news!");
