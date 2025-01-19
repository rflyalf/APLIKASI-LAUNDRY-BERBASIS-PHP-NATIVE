<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    main {
        flex: 1;
    }

    footer {
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 1rem 0;
    }
    </style>
</head>

<body>
    <?php
    include 'header.php';
    include '../koneksi.php';

    $dari = '2025-01-01';
    $sampai = '2025-12-31';

    $result1 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pelanggan");
    $data1 = mysqli_fetch_assoc($result1);
    $total_pelanggan = $data1['total'];

    $result2 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM transaksi");
    $data2 = mysqli_fetch_assoc($result2);
    $total_transaksi = $data2['total'];

    $result3 = mysqli_query($conn, "SELECT COUNT(*) AS total FROM transaksi WHERE DATE(transaksi_tgl) >= '$dari' AND DATE(transaksi_tgl) <= '$sampai'");
    $data3 = mysqli_fetch_assoc($result3);
    $total_reports = $data3['total'];
    ?>
    <main class="container mt-4">
        <h6 class="alert alert-info">
            <marquee behavior="scroll" direction="left" scrollamount="5">
                <b>Welcome!</b> to the laundry information system
            </marquee>
        </h6>
        <h1>Hi, <?php echo $_SESSION['username']; ?> </h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <p class="card-text">Total Customers: <?php echo $total_pelanggan; ?></p>
                        <a href="pelanggan.php" class="btn btn-success">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Transaction</h5>
                        <p class="card-text">Total Transactions: <?php echo $total_transaksi; ?></p>
                        <a href="transaksi.php" class="btn btn-warning">View Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">Total Reports: <?php echo $total_reports; ?></p>
                        <a href="laporan.php" class="btn btn-danger">View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2024 Sistem Informasi Laundry. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>