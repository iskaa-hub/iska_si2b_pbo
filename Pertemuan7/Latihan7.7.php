<?php
// Definisi kelas Employee
class Employee {
    private $first_name;
    private $last_name;
    private $age;

    // Konstruktor untuk inisialisasi properti
    public function __construct($first_name, $last_name, $age) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }

    // Method untuk mendapatkan nama depan
    public function getFirstName() {
        return $this->first_name;
    }

    // Method untuk mendapatkan nama belakang
    public function getLastName() {
        return $this->last_name;
    }

    // Method untuk mendapatkan usia
    public function getAge() {
        return $this->age;
    }
}

// Membuat objek pertama
$objEmployeeOne = new Employee('Bob', 'Smith', 30);
echo $objEmployeeOne->getFirstName() . "<br>"; // Output: Bob
echo $objEmployeeOne->getLastName() . "<br>";  // Output: Smith
echo $objEmployeeOne->getAge() . "<br>";       // Output: 30

// Membuat objek kedua
$objEmployeeTwo = new Employee('John', 'Smith', 34);
echo $objEmployeeTwo->getFirstName() . "<br>"; // Output: John
echo $objEmployeeTwo->getLastName() . "<br>";  // Output: Smith
echo $objEmployeeTwo->getAge() . "<br>";       // Output: 34
?>