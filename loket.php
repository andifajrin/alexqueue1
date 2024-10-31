<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Loket Pemanggil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .jarak {
            margin-bottom: 10px;
            border-radius: 30px;
            padding: 10px;
        }
        .bgheader {
            background-color : #28a745;
        }
        .text {
            font-size : 30px;
        }
        .maincolor {
            
        }
        .menu {
            padding : 10px;
            font-size : 20px;
            border-radius : 10px;
            background-color : #28a745;
            color : white;
            border : none;
        }
        .row1 {
            background-color : #28a745;
            margin: 20px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bgheader p-3">
            <a class="navbar-brand font-weight-bold text text-light" href="#">Dashboard Antrian RS Hermina Makassar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                </ul>
                <span class="navbar-text text-light">
                    Develop By Alex
                </li>
                </ul>
                </span>
            </div>
        </nav>
    </header>
    <div class="container-fluid text-center mt-5">
    <h1>Loket Pemanggil Antrian</h1>
    <form id="loketForm">
        <div class="container">
            <div class="row row1">
                <div class="col">
                    <label for="loket">Pilih Loket:</label>
                <select id="loket" name="loket" class="menu">
                <?php
                // Query untuk mengambil data loket
                $sql = "SELECT id, name FROM counter";
                $result = $conn->query($sql);

                // Tampilkan setiap loket sebagai opsi dropdown
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada loket</option>";
                }
                ?>
            </select>
                </div>
            <div class="col">
                <label for="antrian">Pilih Antrian:</label>
                    <select id="antrian" name="antrian" class="menu">
                        <option value="A">Antrian A</option>
                        <option value="B">Antrian B</option>
                        <option value="C">Antrian C</option>
                    </select>
            </div>
        </div>
        <div class="row row1">
            <div class="col">
                <div id="antrianDipanggil">
                    <h1>Antrian yang dipanggil: </h1> 
                    <h1><span id="queueNumber"></span></h1>
                </div>
            </div>
        </div>
        <div class="row row2">
            <div class="col">
            <button class="btn btn-success btn-lg" type="button" onclick="panggilAntrian()">Panggil Antrian</button>
            </div>
            <div class="col">
            <button class="btn btn-success btn-lg" type="button" onclick="panggilUlang()">Panggil Ulang</button>
            </div>
            </form>
        </div>
        
        </div>
    
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    </div>
</body>

</html>