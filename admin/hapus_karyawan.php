<?php
require '../function.php';

$id_karyawan = $_GET["id_karyawan"];

if (hapus_karyawan($id_karyawan) > 0) {
    echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'karyawan.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'karyawan.php';
		</script>
	";
}
