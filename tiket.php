<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ambil Antrian</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .antrian-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #ffffff;
        }
        .btn-antrian {
            flex-shrink: 0; /* Prevent button from shrinking */
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">Ambil Antrian</h1>

    <div class="antrian-container">
        <span>Antrian A</span>
        <button class="btn btn-primary btn-antrian" onclick="ambilAntrian('A')">Ambil Antrian A</button>
    </div>

    <div class="antrian-container">
        <span>Antrian B</span>
        <button class="btn btn-primary btn-antrian" onclick="ambilAntrian('B')">Ambil Antrian B</button>
    </div>

    <div class="antrian-container">
        <span>Antrian C</span>
        <button class="btn btn-primary btn-antrian" onclick="ambilAntrian('C')">Ambil Antrian C</button>
    </div>
</div>

<script src="js/main.js"></script>

</body>
</html>
