<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lostnfound";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM foundItems";
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
    echo '<div class="no-items-found">No items found in the gallery.</div>';
}

$conn->close();
?>
    
 <style>
 .no-items-found {
        color: #ff0000; /* Set the color to red */
        font-size: 18px; /* Set the font size to 18 pixels */
        font-weight: bold; /* Make the text bold */
        text-align: center; /* Center the text */
        margin-top: 20px; /* Add some top margin */
    }
 </style> 
