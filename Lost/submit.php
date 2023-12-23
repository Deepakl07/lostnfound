<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lostnfound";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST["itemName"];
    $itemDescription = $_POST["itemDescription"];
    $contactInfo = $_POST["contactInfo"];

    $image = $_FILES["itemImage"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Create the 'uploads' directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO items (name, description, image, contact) VALUES ('$itemName', '$itemDescription', '$target_file', '$contactInfo')";

        if ($conn->query($sql) === TRUE) {
            echo "Item successfully submitted!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to move the uploaded file.";
    }
}

$conn->close();
?>
