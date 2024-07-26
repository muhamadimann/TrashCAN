<?php
require '../function.php';

$id_pemesan = $_GET["id_pemesan"];

if (hapus_pesanan($id_pemesan) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'pesanan.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'pesanan.php';
		</script>
	";
}
