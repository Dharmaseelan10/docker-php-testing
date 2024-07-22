<?php
require_once "db.php"; // Include db.php for database connection

// Escape function for safe input handling
function escape($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = escape($_POST['username'], $conn);
    $password = $_POST['password'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                // Start session and store username
                session_start();
                $_SESSION['username'] = $username;

                // Redirect to dashboard on successful login
                header("Location: dashboard.html");
                exit();
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
