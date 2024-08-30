<?php

class Charity {
    private $id;
    private $name;
    private $representativeEmail;

    public function __construct($id, $name, $representativeEmail) {
        $this->setId($id);
        $this->setName($name);
        $this->setRepresentativeEmail($representativeEmail);
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getRepresentativeEmail() {
        return $this->representativeEmail;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        if (empty($name)) {
            throw new Exception("Name cannot be empty.");
        }
        $this->name = $name;
    }

    public function setRepresentativeEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }
        $this->representativeEmail = $email;
    }
}
?>