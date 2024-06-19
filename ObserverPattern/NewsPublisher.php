<?php

class NewsPublisher implements Subject
{
    private $observers;
    private $title;
    private $content;

    public function registerObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer)
    {
        $key = array_search($observer, $this->observers);
        if ($key !== null) {
            unset($this->observers[$key]);
        }
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->title, $this->content);
        }
    }


    public function publishNews($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->notifyObservers();
    }
}
