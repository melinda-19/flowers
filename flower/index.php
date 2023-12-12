<?php
session_start();

$showEditButton = isset($_SESSION["user_id"]);
if ($showEditButton) {
    $buttonText = "Logout";
    $buttonLink = "logout.php";
} else {
    $buttonText = "Login";
    $buttonLink = "login.php";
}

// Include the koneksi.php file for the database connection
include 'koneksi.php';

// Query to get flower data from the database
$sql = "SELECT * FROM flowers ORDER BY name ASC";
$result = $conn->query($sql);
$result2 = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }
        .hidden-input {
            display: none;
        }
        .flower-image {
            display: flex; 
            width: 22rem; 
            max-width: 100%;
            height: 22rem; 
            background-position: center; 
            background-size: cover; 
            background-size: cover; 
            border-top-left-radius: 4px; 
            border-top-right-radius: 4px;
        }
    </style>
    <title>Flower Catalog</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateDatetime() {
            $.ajax({
                url: 'getDatetime.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('.navbar-brand').html('Flower Catalog  (' + data.datetime + ')');
                },
                error: function (error) {
                    console.error('Error fetching datetime:', error);
                }
            });
        }

        $(document).ready(function () {
            updateDatetime();

            setInterval(updateDatetime, 1000);
        });

        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.querySelector("#searchInput");

            searchInput.addEventListener("input", function () {
                const query = searchInput.value;
                const flowerSaveElement = document.getElementById('flowerSave');
                const flowerContainerElement = document.getElementById('flowerContainer');

                if (query.length >= 3) {
                    fetch(`search.php?query=${query}`)
                        .then(response => response.json())
                        .then(flowers => {
                            updateFlowerCards(flowers);
                            flowerSaveElement.classList.add('d-none');
                            flowerContainerElement.classList.remove('d-none');
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    flowerSaveElement.classList.remove('d-none');
                    flowerContainerElement.classList.add('d-none');
                }
            });

            function updateFlowerCards(flowers) {
                const flowerContainer = document.querySelector("#flowerContainer");
                flowerContainer.innerHTML = "";

                const showEditButton = true

                flowers.forEach(flower => {
                    const card = showEditButton ? `
                        <div class="col d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                <div class="flower-image" style="background-image: url('photo/${(flower.id % 10) + 1}.jpg')"></div>
                                <div class="card-body">
                                    <h5 class="card-title">${flower.name}</h5>
                                    <p class="card-text">${flower.description}</p>
                                    <p class="card-text">Price: Rp ${parseFloat(flower.price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</p>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal${flower.id}">Edit</a>
                                </div>
                            </div>
                        </div>
                    ` : `
                        <div class="col d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                <img src="https://media.houseandgarden.co.uk/photos/624ebf44b313fe794cb8cd12/1:1/w_2700,h_2700,c_limit/CNSTMMGLPICT000000935313.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">${flower.name}</h5>
                                    <p class="card-text">${flower.description}</p>
                                    <p class="card-text">Price: Rp ${parseFloat(flower.price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}</p>
                                </div>
                            </div>
                        </div>
                    `;

                    flowerContainer.innerHTML += card;
                });
            }
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Flower Catalog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <div class="d-flex">
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                    <?php if ($showEditButton) { ?><button class="btn btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</button> <?php } ?>
                    <a href="<?php echo $buttonLink; ?>" class="btn btn-outline-success"><?php echo $buttonText; ?></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="create.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="flowerName" class="form-label">Flower Name:</label>
                            <input type="text" class="form-control" id="flowerName" name="flowerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="flowerDescription" class="form-label">Flower Description:</label>
                            <textarea class="form-control" id="flowerDescription" name="flowerDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="flowerPrice" class="form-label">Flower Price (Rp):</label>
                            <input type="number" class="form-control" id="flowerPrice" name="flowerPrice" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="flowerContainer" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-2"></div>
    <div id="flowerSave" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-2">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 22rem;">
                <div class="flower-image" style="background-image: url('photo/<?php echo (($row['id'] % 10) + 1) ?>.jpg')"></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <p class="card-text">Price: Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></p>
                    <?php if ($showEditButton) : ?>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</a>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $row['id']; ?>">Hapus</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
        <?php
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
        ?>
        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="update.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="hidden-input" id="flowerId" name="flowerId" value="<?php echo $row['id']; ?>" required>
                            <div class="mb-3">
                                <label for="flowerName" class="form-label">Flower Name:</label>
                                <input type="text" class="form-control" id="flowerName" name="flowerName" value="<?php echo $row['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="flowerDescription" class="form-label">Flower Description:</label>
                                <textarea class="form-control" id="flowerDescription" name="flowerDescription" rows="3" required><?php echo $row['description']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="flowerPrice" class="form-label">Flower Price (Rp):</label>
                                <input type="number" class="form-control" id="flowerPrice" name="flowerPrice" value="<?php echo $row['price']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="hapusModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="delete.php" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLabel">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="hidden-input" id="flowerId" name="flowerId" value="<?php echo $row['id']; ?>" required>
                            <p>Anda yakin ingin menghapus bunga ini (<?php echo $row['name']; ?>)?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>