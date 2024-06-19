b<?php

    class NewSubcriber implements Observer
    {
        private $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function update($title, $content)
        {
            echo " Hello {$this->name} a new article has been published {$title}";
            echo "</br>";
            echo "Content {$content}";
            echo "</br>";
        }
    }
