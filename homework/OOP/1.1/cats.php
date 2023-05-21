<?php
    class Cat {
        private string $name;
        private string $color;

        public function __construct($name, $color) {
            $this->name = $name;
            $this->color = $color;
        }

        public function setName(string $name) {
            $this->name = $name;
        }
        public function getName(): string {
            return $this->name;
        }
        public function setColor(string $color) {
            $this->color = $color;
        }
        public function getColor(): string {
            return $this->color;
        }
        public function sayHello(): string {
            return "Привет, меня зовут {$this->getName()}! Мой цвет - {$this->getColor()}, мяу :З";
        }
    }

    $cat = new Cat('Муся', 'синий');
    print($cat->sayHello() . "\n");
?>