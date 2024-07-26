<?php
require '../function.php';

$id_paket = $_GET["id_paket"];

if (hapus_paket($id_paket) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'paket.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'paket.php';
		</script>
	";
}
