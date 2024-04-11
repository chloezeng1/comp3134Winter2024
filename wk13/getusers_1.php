<?php
// Database connection setup
$conn = new mysqli('localhost', 'root', '605b18e9c563f86a674cb1a9da72d767e1cb314bb53dbbfd', 'mydatabase');

// Check for POST submission
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM users WHERE firstname = '$search' AND active = 1";
    $result = $conn->query($query);
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
}
?>

<form method="GET" action="getusers_1.php">
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>