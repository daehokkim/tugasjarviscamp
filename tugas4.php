<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
        }
        .form-container, .table-container {
            width: 48%;
        }
        .form-container h1 {
            font-size: 24px;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #6a0dad;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #5b0c9c;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table-container th {
            background-color: #f2f2f2;
        }
        .table-container h2 {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Form Produk</h1>
            <form method="POST">
                <label for="barang">Nama Barang:</label>
                <input type="text" id="barang" name="barang" required>

                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" required>

                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>

                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" required>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="table-container">
            <h2>Daftar Produk</h2>
            <?php
                $products = [
                    ["barang" => "Printer", "Harga" => 1200000, "Deskripsi" => "Printer merk HP", "Stok" => 15],
                    ["barang" => "Tablet", "Harga" => 2000000, "Deskripsi" => "Tablet merk Samsung", "Stok" => 8],
                    ["barang" => "Mouse", "Harga" => 150000, "Deskripsi" => "Mouse merk Logitech", "Stok" => 50],
                    ["barang" => "Speaker", "Harga" => 500000, "Deskripsi" => "Speaker merk JBL", "Stok" => 25],
                    ["barang" => "Headset", "Harga" => 250000, "Deskripsi" => "Headset merk Sony", "Stok" => 30]
                ];

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $newProduct = [
                        "barang" => $_POST['barang'],
                        "Harga" => $_POST['harga'],
                        "Deskripsi" => $_POST['deskripsi'],
                        "Stok" => $_POST['stok']
                    ];
                    $products[] = $newProduct;
                }

                // Menampilkan Data Produk
                echo "<table>";
                echo "<tr><th>Nama Barang</th><th>Harga</th><th>Deskripsi</th><th>Stok</th></tr>";
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($product['barang']) . "</td>";
                    echo "<td>Rp " . number_format($product['Harga'], 0, ',', '.') . "</td>";
                    echo "<td>" . htmlspecialchars($product['Deskripsi']) . "</td>";
                    echo "<td>" . htmlspecialchars($product['Stok']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>
