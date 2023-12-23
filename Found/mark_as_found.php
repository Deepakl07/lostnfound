<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lostnfound";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the item ID from the form
    $item_id = $_POST['item_id'];

    // Fetch the item details from the original collection
    $select_sql = "SELECT * FROM items WHERE id = $item_id";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        // Fetch the item details
        $row = $result->fetch_assoc();

        // Delete the item from the original collection
        $delete_sql = "DELETE FROM items WHERE id = $item_id";
        if ($conn->query($delete_sql) === TRUE) {
            // Insert the item into the 'foundItems' collection
            $insert_sql = "INSERT INTO foundItems (name, description, contact, image) VALUES 
                            ('" . $row['name'] . "', '" . $row['description'] . "', '" . $row['contact'] . "', '" . $row['image'] . "')";
            
            if ($conn->query($insert_sql) === TRUE) {
                // Display success message and stay on the same page
                echo "<script>alert('Item marked as found successfully.'); window.location.href = document.referrer;</script>";
            } else {
                // Display error message and stay on the same page
                echo "<script>alert('Error marking as done: " . $conn->error . "'); window.location.href = document.referrer;</script>";
            }
        } else {
            // Display error message and stay on the same page
            echo "<script>alert('Error deleting item from the original collection: " . $conn->error . "'); window.location.href = document.referrer;</script>";
        }
    } else {
        // Display error message and stay on the same page
        echo "<script>alert('Item not found in the original collection.'); window.location.href = document.referrer;</script>";
    }
} else {
    // Display error message and stay on the same page
    echo "<script>alert('Invalid request.'); window.location.href = document.referrer;</script>";
}

$conn->close();
?>
