<?php

$conn = new mysqli('localhost', 'root', 'duyvan2001', 'testkn');

$content = $_POST['content'];

$sql = "select * from testimg";

$stmt = $conn->query($sql);
$result = $stmt->fetch_all(MYSQLI_ASSOC);


echo "<pre>";
// print_r($result[0]);
echo htmlspecialchars($result[1]['clongblob']);
echo "</pre>";



// var_dump($_FILES);