<?php
class Person {

    private $name;
    private $surname;
    private $username;
    private $password;

    public function __construct($name, $surname, $username, $password) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}