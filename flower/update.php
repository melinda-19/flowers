<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowerId = $_POST['flowerId'];
    $flowerName = $_POST['flowerName'];
    $flowerDescription = $_POST['flowerDescription'];
    $flowerPrice = $_POST['flowerPrice'];

    $sql = "UPDATE flowers SET name='$flowerName', description='$flowerDescription', price='$flowerPrice' WHERE id=$flowerId";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

header("Location: index.php");
?>