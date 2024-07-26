<?php
session_start();
require 'function.php';

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

if (isset($_POST["tambah"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah_pesanan($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'user.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'user.php';
			</script>
		";
    }
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
    <div class="mx-auto mt-5" style="width: 800px;">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Rp. 20.000<small class="text-muted fw-light">/mo</small></h1>
                        <p>Berlangganan pemungutan sampah selama 1 bulan</p>
                        <a href="#" onClick="paket1(); return true;" class="w-100 btn btn-lg btn-outline-success">Paket 1</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Rp. 100.000<small class="text-muted fw-light">/6mo</small></h1>
                        <p>Berlangganan pemungutan sampah selama 6 bulan</p>
                        <a href="#" onClick="paket2(); return true;" class="w-100 btn btn-lg btn-success">Paket 2</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-success">
                    <div class="card-header py-3 text-white bg-success border-success">
                        <h4 class="my-0 fw-normal">Enterprise</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Rp. 210.000<small class="text-muted fw-light">/year</small></h1>
                        <p>Berlangganan pemungutan sampah selama 1 tahun</p>
                        <a href="#" onClick="paket3(); return true;" class="w-100 btn btn-lg btn-success">Paket 3</a>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="wrapper">
        <div class="title">
            <p class="hijau"> Order </p>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="id_pemesan" required>
                <div class="mb-3">
                    <label class="form-label">Id Paket</label>
                    <input type="number" class="form-control" name="id_paket" id="id_paket" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" name="nama_pemesan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" name="nama_paket" id="nama_paket" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Paket</label>
                    <input type="number" class="form-control" name="harga_paket" id="harga_paket" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Pemesan</label>
                    <input type="text" class="form-control" name="alamat_pemesan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Tlp Pemesan</label>
                    <input type="number" class="form-control" name="no_hp_pemesan" required>
                </div>
                <br>
                <input type="hidden" class="form-control" name="status" value="Belum Bayar" required>
                <button type="submit" class="btn btn-success" name="tambah">Order</button>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">
        function paket1() {
            document.getElementById('id_paket').value = "1";
            document.getElementById('nama_paket').value = "Paket 1 Bulan";
            document.getElementById('harga_paket').value = "20000";
        }

        function paket2() {
            document.getElementById('id_paket').value = "2";
            document.getElementById('nama_paket').value = "Paket 6 Bulan";
            document.getElementById('harga_paket').value = "100000";
        }

        function paket3() {
            document.getElementById('id_paket').value = "3";
            document.getElementById('nama_paket').value = "Paket 1 Tahun";
            document.getElementById('harga_paket').value = "210000";
        }
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>