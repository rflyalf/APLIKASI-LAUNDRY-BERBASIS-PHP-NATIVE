<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        background: linear-gradient(to right, #6a11cd, #2575fc);
        height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Arial', sans-serif;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1s ease-in-out;
    }

    .btn-primary {
        background-color: #2575fc;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #6a11cb;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center mb-4 Display-6">Laundry Apps</h3>
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-danger'>Login Gagal! Username dan Password Salah.</div>";
            } else if ($_GET['pesan'] == "logout") {
                echo "<div class='alert alert-info'>Anda telah berhasil logout.</div>";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin.</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Masuk</button>
                <button type="reset" class="btn btn-emphasis w-100 rounded-pill">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>