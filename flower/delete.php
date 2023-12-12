<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowerId = $_POST['flowerId'];

    $sql = "DELETE FROM flowers WHERE id=$flowerId";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

header("Location: index.php");
?>