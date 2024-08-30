<?php

class Donation {
    private $id;
    private $donorName;
    private $amount;
    private $charityId;
    private $dateTime;

    public function __construct($id, $donorName, $amount, $charityId) {
        $this->setId($id);
        $this->setDonorName($donorName);
        $this->setAmount($amount);
        $this->setCharityId($charityId);
        $this->dateTime = new DateTime();
    }

    public function getId() {
        return $this->id;
    }

    public function getDonorName() {
        return $this->donorName;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCharityId() {
        return $this->charityId;
    }

    public function getDateTime() {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDonorName($donorName) {
        if (empty($donorName)) {
            throw new Exception("Donor name cannot be empty.");
        }
        $this->donorName = $donorName;
    }

    public function setAmount($amount) {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new Exception("Donation amount must be a positive number.");
        }
        $this->amount = $amount;
    }

    public function setCharityId($charityId) {
        $this->charityId = $charityId;
    }
}
?>
