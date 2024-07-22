<?php
require_once "db.php"; // Include db.php for database connection

// Query to fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

$conn->close();
?>
