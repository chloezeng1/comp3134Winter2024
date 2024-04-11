<?php
// Database connection setup
$conn = new mysqli('localhost', 'root', '605b18e9c563f86a674cb1a9da72d767e1cb314bb53dbbfd', 'mydatabase');

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for GET submission
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    // Output the results
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $column) {
            echo "<td>" . $column . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Close the statement
    $stmt->close();
}

$conn->close();
?>

<form method="GET" action="getusers_2.php">
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>
