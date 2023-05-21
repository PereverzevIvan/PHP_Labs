<?php
    abstract class Human {
        private string $name;

        public function __construct(string $name)
        {
            $this->name = $name;
        }

        public function getName(): string
        {
            return $this->name;
        }

        abstract public function getGreetings(): string;
        abstract public function getMyNameIs(): string;

        public function introduceYourself(): string
        {
            return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
        }
    }

    class RussianHuman extends Human {
        public function getGreetings(): string {
            return 'Привет';
        }
        public function getMyNameIs(): string {
            return 'Меня зовут';
        }
    }

    class EnglishHuman extends Human {
        public function getGreetings(): string {
            return 'Hello';
        }
        public function getMyNameIs(): string {
            return 'My name is';
        }
    }

    $ru_man = new RussianHuman('Иван');
    $en_man = new EnglishHuman('Jhon');

    print_r($ru_man->introduceYourself());
    print("\n");
    print_r($en_man->introduceYourself());
?>