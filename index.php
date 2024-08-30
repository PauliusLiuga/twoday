<?php

require_once 'Charity.php';
require_once 'Donation.php';
require_once 'CharityManager.php';

$charityManager = new CharityManager();

while (true) {
    echo "\nChoose an option:\n";
    echo "1. View Charities\n";
    echo "2. Add Charity\n";
    echo "3. Edit Charity\n";
    echo "4. Delete Charity\n";
    echo "5. Add Donation\n";
    echo "6. Import Charities from CSV\n";
    echo "7. Exit\n";
    $choice = trim(fgets(STDIN));

    try {
        switch ($choice) {
            case 1:
                $charityManager->viewCharities();
                break;
            case 2:
                echo "Enter Charity ID: ";
                $id = trim(fgets(STDIN));
                echo "Enter Charity Name: ";
                $name = trim(fgets(STDIN));
                echo "Enter Representative Email: ";
                $email = trim(fgets(STDIN));
                $charityManager->addCharity($id, $name, $email);
                break;
            case 3:
                echo "Enter Charity ID to edit: ";
                $id = trim(fgets(STDIN));
                echo "Enter new Charity Name: ";
                $name = trim(fgets(STDIN));
                echo "Enter new Representative Email: ";
                $email = trim(fgets(STDIN));
                $charityManager->editCharity($id, $name, $email);
                break;
            case 4:
                echo "Enter Charity ID to delete: ";
                $id = trim(fgets(STDIN));
                $charityManager->deleteCharity($id);
                break;
            case 5:
                echo "Enter Donation ID: ";
                $id = trim(fgets(STDIN));
                echo "Enter Donor Name: ";
                $donorName = trim(fgets(STDIN));
                echo "Enter Donation Amount: ";
                $amount = trim(fgets(STDIN));
                echo "Enter Charity ID: ";
                $charityId = trim(fgets(STDIN));
                $charityManager->addDonation($id, $donorName, $amount, $charityId);
                break;
            case 6:
                echo "Enter CSV file path: ";
                $filePath = trim(fgets(STDIN));
                $charityManager->importCharitiesFromCSV($filePath);
                break;
            case 7:
                exit("Exiting...\n");
            default:
                echo "Invalid choice. Please try again.\n";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
?>
