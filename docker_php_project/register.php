<?php
require_once "db.php"; // Include db.php for database connection

// Escape function for safe input handling
function escape($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = escape($_POST['username'], $conn);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            
            header("Location: login.html");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
