<?php
// Step 1: Connect to MySQL
$servername = "localhost";
$username = "root";
$password = ""; // Default is blank on XAMPP
$dbname = "test_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Step 2: Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Check if username is passed via GET
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Step 4: Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT id, username, email FROM users WHERE username = ?");
    $stmt->bind_param("s", $username); // Bind the username

    $stmt->execute(); // Run the query
    $result = $stmt->get_result(); // Get result set

    // Step 5: Display user info if found
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h3>User Info:</h3>";
            echo "ID: " . $row["id"] . "<br>";
            echo "Username: " . $row["username"] . "<br>";
            echo "Email: " . $row["email"] . "<br><hr>";
        }
    } else {
        echo "No user found.";
    }

    // Step 6: Cleanup
    $stmt->close();
} else {
    echo "Please provide a username using ?username=... in the URL.";
}

$conn->close(); // Close connection
?>
