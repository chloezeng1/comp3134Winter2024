<?php
// Read the contents of the text file and output them directly
$content = file_get_contents('storedxss.txt');
echo $content;
?>
