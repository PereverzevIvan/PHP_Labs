<?php
class Post
{
    private $title;
    private $text;


    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }
}


class Lesson extends Post
{
    private $homework;

    public function __construct(string $title, string $text, string $homework)
    {
        parent::__construct($title, $text);
        $this->homework = $homework;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }

    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }
}


class PaidLesson extends Lesson {
    private float $price;
    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent::__construct($title, $text, $homework);
        $this->price = $price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}



$lesson = new PaidLesson('Урок по наследованию в PHP', 'Лол, кек, чебурек :D', 'Ложитесь спать, утро вечера мудренее', 99.99);

print_r($lesson);