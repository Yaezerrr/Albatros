<?php
// config.php
$dsn = 'mysql:host=localhost;dbname=register';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 1: Delete existing records
    $deleteSql = "DELETE FROM register";
    $pdo->exec($deleteSql); // Executes the delete query

    // Step 2: Collect form data
    $firstName = $_POST['firstName'] ?? null;
    $middleName = $_POST['middleName'] ?? null;
    $lastName = $_POST['lastName'] ?? null;
    $dateOfBirth = $_POST['dateOfBirth'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $phoneNumber = ($_POST['dialCode'] ?? '') . ($_POST['phoneNumber'] ?? '');
    $email = $_POST['email'] ?? null;
    $streetAddress = $_POST['streetAddress'] ?? null;
    $apartmentNumber = $_POST['apartmentNumber'] ?? null;
    $lga = $_POST['lga'] ?? null;
    $state = $_POST['state'] ?? null;
    $zipCode = $_POST['zipCode'] ?? null;
    $country = $_POST['country'] ?? null;
    $city = $_POST['city'] ?? null;  // New field for city
    $seatPreference = $_POST['seatPreference'] ?? null;
    $mealPreference = $_POST['mealPreference'] ?? null;
    $emergencyContactName = $_POST['emergencyContactName'] ?? null;
    $emergencyContactRelation = $_POST['emergencyContactRelation'] ?? null;

    $emergencyContactPhone = $_POST['emergencyContactPhone'] ?? null;
    $id = ($_POST['idType'] ?? '') . ' - ' . ($_FILES['idPhoto']['name'] ?? '');
    $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

    // Step 3: Insert new data into the register table
    $insertSql = "INSERT INTO register (
                    firstName, middleName, lastName, dateOfBirth, gender, phoneNumber, email,
                    streetAddress, apartmentNumber, lga, state, zipCode, country, city,
                    seatPreference, mealPreference, emergencyContactName, emergencyContactRelation,
                    emergencyContactPhone, id, password
                ) VALUES (
                    :firstName, :middleName, :lastName, :dateOfBirth, :gender, :phoneNumber, :email,
                    :streetAddress, :apartmentNumber, :lga, :state, :zipCode, :country, :city,
                    :seatPreference, :mealPreference, :emergencyContactName, :emergencyContactRelation,
                    :emergencyContactPhone, :id, :password
                )";

    $stmt = $pdo->prepare($insertSql);
    $stmt->execute([
        ':firstName' => $firstName,
        ':middleName' => $middleName,
        ':lastName' => $lastName,
        ':dateOfBirth' => $dateOfBirth,
        ':gender' => $gender,
        ':phoneNumber' => $phoneNumber,
        ':email' => $email,
        ':streetAddress' => $streetAddress,
        ':apartmentNumber' => $apartmentNumber,
        ':lga' => $lga,
        ':state' => $state,
        ':zipCode' => $zipCode,
        ':country' => $country,
        ':city' => $city,
        ':seatPreference' => $seatPreference,
        ':mealPreference' => $mealPreference,
        ':emergencyContactName' => $emergencyContactName,
        ':emergencyContactRelation' => $emergencyContactRelation,
        ':emergencyContactPhone' => $emergencyContactPhone,
        ':id' => $id,
        ':password' => $password
    ]);

    echo "Registration successful!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}