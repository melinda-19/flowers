<?php
include 'koneksi.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM flowers WHERE name LIKE '%$query%' ORDER BY name ASC";
    $result = $conn->query($sql);

    $flowers = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $flowers[] = $row;
        }
    }

    echo json_encode($flowers);
}

$conn->close();
?>