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

        // Add an "Options" button with a link to a script that handles marking the item as found
        echo '<form action="mark_as_found.php" method="post" class="options-form">';
        echo '<input type="hidden" name="item_id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="options-button">Mark as Found</button>';
        echo '</form>';

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
    .options-form {
        display: inline-block; /* Ensure the form and button are on the same line */
    }

    .options-button {
        background-color: #4caf50; /* Green background color */
        color: white; /* White text color */
        border: none; /* Remove border */
        padding: 8px 12px; /* Add some padding */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underlining */
        display: inline-block; /* Make it an inline block */
        font-size: 14px; /* Set font size */
        cursor: pointer; /* Add cursor pointer on hover */
        border-radius: 4px; /* Add some border-radius for a rounded look */
    }

    .options-button:hover {
        background-color: #45a049; /* Darker green color on hover */
    }
</style>

