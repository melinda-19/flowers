<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowerName = $_POST['flowerName'];
    $flowerDescription = $_POST['flowerDescription'];
    $flowerPrice = $_POST['flowerPrice'];

    $sql = "INSERT INTO `flowers`(`name`, `description`, `price`) VALUES ('$flowerName','$flowerDescription','$flowerPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error creating record: " . $conn->error;
    }

    $conn->close();
}

header("Location: index.php");
?>