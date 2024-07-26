<?php
session_start();
require 'function.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM pesanan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$pesanan = query("SELECT * FROM pesanan LIMIT $awalData, $jumlahDataPerHalaman");




//auth check kasir
if (isset($_SESSION['id_user'])) {
    if ($_SESSION['role'] == 1) {
        //redirect ke halaman kasir.php
        header('Location:admin/admin.php');
    }
} else {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header('location:login.php');
}

if (isset($_POST["cetak"])) {
    echo "
			<script>
				alert('data dicetak!');
				document.location.href = 'cetak.php';
			</script>
		";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="asset/img/img-local/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/order.css">
    <title>Order</title>
    <style>
        body {
            background-image: url("asset/img/img-local/sample.jpg");
            background-size: auto;
            padding: 0 10px;
        }

        .wrapper {
            margin-top: 10px;
        }

        .card-title {
            font-size: 24px;
        }

        .judul {
            color: green;
        }

        .hijau {
            color: green;
        }
    </style>
</head>

<body>

    <main>
        <br><br><br>
        <h1 class="h2">Order</h1><br>
        <div class="bg-light p-5 rounded mt-10">
            <div class="bg-success p-1">
                <h1 class="text-center text-white">Order</h1>
            </div>
            <br><br>
            <form class="d-flex" action="" method="POST">
                <input class="form-control me-2" type="search" size="40" autofocus placeholder="Search" aria-label="Search" name="keyword" autocomplete="off">
                <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
            </form><br><br>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id Pemesan</th>
                        <th scope="col">Id Paket</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                        <th scope="col">Alamat Pemesan</th>
                        <th scope="col">No tlp Pemesan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesanan as $row) : ?>
                        <tr>
                            <td><?= $row["id_pemesan"] ?></td>
                            <td><?= $row["id_paket"] ?></td>
                            <td><?= $row["nama_pemesan"]; ?></td>
                            <td><?= $row["nama_paket"]; ?></td>
                            <td><?= $row["harga_paket"]; ?></td>
                            <td><?= $row["alamat_pemesan"]; ?></td>
                            <td><?= $row["no_hp_pemesan"]; ?></td>
                            <td><?= $row["status"]; ?></td>
                            <td>
                                <a class="btn btn-success text-white" href="cetak.php?id_pemesan=<?= $row["id_pemesan"]; ?>">Cetak</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br><br>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($halamanAktif > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>