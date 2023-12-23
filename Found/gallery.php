<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lostnfound";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="gallery-item">';
        echo '<img src="../Lost/' . $row['image'] . '" alt="' . $row['name'] . '">';
        echo '<p><strong>Name:</strong> ' . $row['name'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
        echo '<p><strong>Contact:</strong> ' . $row['contact'] . '</p>';
        echo '</div>';
    }
} else {
    echo "No items found in the gallery.";
}

$conn->close();
?>
