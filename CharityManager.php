<?php

class CharityManager {
    private $charities = [];
    private $donations = [];

    public function viewCharities() {
        foreach ($this->charities as $charity) {
            echo "ID: {$charity->getId()}, Name: {$charity->getName()}, Representative Email: {$charity->getRepresentativeEmail()}\n";
        }
    }

    public function addCharity($id, $name, $email) {
        $charity = new Charity($id, $name, $email);
        $this->charities[$id] = $charity;
        echo "Charity added successfully.\n";
    }

    public function editCharity($id, $name, $email) {
        if (isset($this->charities[$id])) {
            $this->charities[$id]->setName($name);
            $this->charities[$id]->setRepresentativeEmail($email);
            echo "Charity updated successfully.\n";
        } else {
            echo "Charity not found.\n";
        }
    }

    public function deleteCharity($id) {
        if (isset($this->charities[$id])) {
            unset($this->charities[$id]);
            echo "Charity deleted successfully.\n";
        } else {
            echo "Charity not found.\n";
        }
    }

    public function addDonation($id, $donorName, $amount, $charityId) {
        if (!isset($this->charities[$charityId])) {
            throw new Exception("Charity with ID {$charityId} does not exist.");
        }
        $donation = new Donation($id, $donorName, $amount, $charityId);
        $this->donations[] = $donation;
        echo "Donation added successfully.\n";
    }

    public function importCharitiesFromCSV($filePath) {
        if (!file_exists($filePath)) {
            throw new Exception("File not found.");
        }

        $file = fopen($filePath, 'r');
        while (($data = fgetcsv($file)) !== FALSE) {
            $id = $data[0];
            $name = $data[1];
            $email = $data[2];

            $this->addCharity($id, $name, $email);
        }
        fclose($file);
        echo "Charities imported successfully from CSV.\n";
    }
}
?>
