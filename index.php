<?php
// Harga satuan
$prices = [
    'burger' => 25000,
    'pizza' => 50000,
    'soda' => 10000,
    'tea' => 8000,
    'coffee' => 15000,
];

// Inisialisasi variabel jumlah pesanan dan total harga
$burger_qty = $pizza_qty = $soda_qty = $tea_qty = $coffee_qty = 0;
$burger_total = $pizza_total = $soda_total = $tea_total = $coffee_total = $total = 0;

// Jika form dikirimkan, ambil data dari POST dan hitung total harga
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $burger_qty = isset($_POST['burger']) ? (int)$_POST['burger'] : 0;
    $pizza_qty = isset($_POST['pizza']) ? (int)$_POST['pizza'] : 0;
    $soda_qty = isset($_POST['soda']) ? (int)$_POST['soda'] : 0;
    $tea_qty = isset($_POST['tea']) ? (int)$_POST['tea'] : 0;
    $coffee_qty = isset($_POST['coffee']) ? (int)$_POST['coffee'] : 0;

    $burger_total = $burger_qty * $prices['burger'];
    $pizza_total = $pizza_qty * $prices['pizza'];
    $soda_total = $soda_qty * $prices['soda'];
    $tea_total = $tea_qty * $prices['tea'];
    $coffee_total = $coffee_qty * $prices['coffee'];

    $total = $burger_total + $pizza_total + $soda_total + $tea_total + $coffee_total;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pemesanan Makanan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Formulir Pemesanan Makanan</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="burger">Burger (Rp 25,000):</label>
                <input type="number" class="form-control" name="burger" id="burger" min="0" value="<?php echo $burger_qty; ?>">
            </div>
            <div class="form-group">
                <label for="pizza">Pizza (Rp 50,000):</label>
                <input type="number" class="form-control" name="pizza" id="pizza" min="0" value="<?php echo $pizza_qty; ?>">
            </div>
            <div class="form-group">
                <label for="soda">Soda (Rp 10,000):</label>
                <input type="number" class="form-control" name="soda" id="soda" min="0" value="<?php echo $soda_qty; ?>">
            </div>
            <div class="form-group">
                <label for="tea">Tea (Rp 8,000):</label>
                <input type="number" class="form-control" name="tea" id="tea" min="0" value="<?php echo $tea_qty; ?>">
            </div>
            <div class="form-group">
                <label for="coffee">Coffee (Rp 15,000):</label>
                <input type="number" class="form-control" name="coffee" id="coffee" min="0" value="<?php echo $coffee_qty; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2 class="mt-5">Detail Pesanan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Pesanan</th>
                    <th>Harga Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Burger</td>
                    <td>Rp 25,000</td>
                    <td><?php echo $burger_qty; ?></td>
                    <td>Rp <?php echo number_format($burger_total, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Pizza</td>
                    <td>Rp 50,000</td>
                    <td><?php echo $pizza_qty; ?></td>
                    <td>Rp <?php echo number_format($pizza_total, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Soda</td>
                    <td>Rp 10,000</td>
                    <td><?php echo $soda_qty; ?></td>
                    <td>Rp <?php echo number_format($soda_total, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Tea</td>
                    <td>Rp 8,000</td>
                    <td><?php echo $tea_qty; ?></td>
                    <td>Rp <?php echo number_format($tea_total, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Coffee</td>
                    <td>Rp 15,000</td>
                    <td><?php echo $coffee_qty; ?></td>
                    <td>Rp <?php echo number_format($coffee_total, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Harga</th>
                    <th>Rp <?php echo number_format($total, 0, ',', '.'); ?></th>
                </tr>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
