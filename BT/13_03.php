<?php
// Bai 1
    for($i = 0; $i < 100; $i++) {
        echo $i;
        echo "<br>";
    }

//Bai 2
    $coin = rand(0,1);
    if ($coin == 0){
        echo 'Sap';
    } else {
        echo "Ngua";
    }
// Bai 3 
    $stuArray = array(
        array(
            'name' => 'Pham Huu A',
            'age'  => '20',
            'gender' => TRUE,
            'mark' => 7.5
        ),
        array(
            'name' => 'Pham Huu B',
            'age'  => '22',
            'gender' => FALSE,
            'mark' => 9.0
        ),
        array(
            'name' => 'Pham Huu C',
            'age'  => '23',
            'gender' => FALSE,
            'mark' => 3.0
        )
    );
//Bai 4
    class Student {
        public $name;
        public $age;
        public $gender;
        public $mark; 
        function set_student ($name,$age,$gender,$mark){
            $this-> $name;
            $this-> $age;
            $this-> $gender;
            $this-> $mark;
        }
        function gender($gender){
            return $this-> $gender ? "Nam" : "Nu";
        }
    }
    $stuArray = array(
        new Student("Pham Huu A",19,TRUE,9.0),
        new Student("Pham Huu B",20,FALSE,6.5),
        new Student("Pham Huu C",22,true,7.0),
    );
?>