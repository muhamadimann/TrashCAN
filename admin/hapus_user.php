<?php
require '../function.php';

$id_user = $_GET["id_user"];

if (hapus_user($id_user) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'useradmin.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'useradmin.php';
		</script>
	";
}
