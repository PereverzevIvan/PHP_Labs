<?php
    // Инициализация класса
    class Worker {
        // Уровни доступа:
        //   public - доступный всегда и везде
        //   protected - 
        //   private -  
        public string $name;
        public int $age;
        public array $hours;

        public function __construct($name, $age, $hours) {
            $this->name = $name;
            $this->age = $age;
            $this->hours = $hours;

        }

        public function work() {
            echo "Привет, меня зовут {$name}. Мне {$age} лет. Я отработал {$hours} часов.";
        }
    }
    
    // Наследование
    class Developer extends Worker {

    }
    $worker = new Worker('Иван', 18, [123, 123, 12]);
    $worker->work();
?>