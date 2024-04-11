<form method="get">
    <input name="q" placeholder="Enter Text">
    <br/>
    <input type="submit" value="Go">
</form>
<?php
if (isset($_GET['q'])) {
    $input = $_GET['q'];

    // Stripping tags
    $stripped = strip_tags($input);
    echo "Stripped Output: " . $stripped;

    // Encoding to HTML entities
    $encoded = htmlspecialchars($input);
    echo "<br>Encoded Output: " . $encoded;
}
?>

