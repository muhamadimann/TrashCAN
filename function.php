<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "trashcan");

// tampil
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
// upload 
function upload()
{

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

	return $namaFileBaru;
}
//registrasi
function registrasi($data)
{
	global $conn;

	$nama_user = strtolower(stripslashes($data["nama_user"]));
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$alamat_user = strtolower(stripslashes($data["alamat_user"]));
	$no_hp = strtolower(stripslashes($data["no_hp"]));

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}


	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$nama_user', '$username', '$password','$alamat_user','$no_hp','2')");

	return mysqli_affected_rows($conn);
}


//Fungsi CRUD

//Fungsi tambah
function tambah_user($data)
{
	global $conn;
	$id_user = htmlspecialchars($data["id_user"]);
	$nama_user = htmlspecialchars($data["nama_user"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$alamat_user = htmlspecialchars($data["alamat_user"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$role = htmlspecialchars($data["role"]);

	$query = "INSERT INTO users
				VALUES
			  ('null', '$nama_user','$username','$password','$alamat_user', '$no_hp', '$role')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function tambah_karyawan($data)
{
	global $conn;
	$id_karyawan = htmlspecialchars($data["id_karyawan"]);
	$nama_karyawan = htmlspecialchars($data["nama_karyawan"]);

	$query = "INSERT INTO karyawan
				VALUES
			  ('null', '$nama_karyawan')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function tambah_paket($data)
{
	global $conn;
	$id_paket = htmlspecialchars($data["id_paket"]);
	$nama_paket = htmlspecialchars($data["nama_paket"]);
	$harga_paket = htmlspecialchars($data["harga_paket"]);

	$query = "INSERT INTO paket
				VALUES
			  ('null', '$nama_paket','$harga_paket')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function tambah_pesanan($data)
{
	global $conn;
	$id_pemesan = htmlspecialchars($data["id_pemesan"]);
	$id_paket = htmlspecialchars($data["id_paket"]);
	$nama_pemesan = htmlspecialchars($data["nama_pemesan"]);
	$nama_paket = htmlspecialchars($data["nama_paket"]);
	$harga_paket = htmlspecialchars($data["harga_paket"]);
	$alamat_pemesan = htmlspecialchars($data["alamat_pemesan"]);
	$no_hp_pemesan = htmlspecialchars($data["no_hp_pemesan"]);
	$status = htmlspecialchars($data["status"]);
	$query = "INSERT INTO pesanan
				VALUES
			  ('null','$id_paket', '$nama_pemesan','$nama_paket','$harga_paket','$alamat_pemesan', '$no_hp_pemesan','$status')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

//Fungsi ubah
function ubah_user($data)
{
	global $conn;

	$id_user = htmlspecialchars($data["id_user"]);
	$nama_user = htmlspecialchars($data["nama_user"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$alamat_user = htmlspecialchars($data["alamat_user"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$role = htmlspecialchars($data["role"]);


	$query = "UPDATE users SET
				id_user = '$id_user',
				nama_user = '$nama_user',
				username = '$username',
				password = '$password',
				alamat_user = '$alamat_user',
				no_hp = '$no_hp',
				role = '$role'
			  WHERE id_user = $id_user
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function ubah_karyawan($data)
{
	global $conn;

	$id_karyawan = htmlspecialchars($data["id_karyawan"]);
	$nama_karyawan = htmlspecialchars($data["nama_karyawan"]);

	$query = "UPDATE karyawan SET
				id_karyawan = '$id_karyawan',
				nama_karyawan = '$nama_karyawan'
			  WHERE id_karyawan = $id_karyawan
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function ubah_paket($data)
{
	global $conn;

	$id_paket = htmlspecialchars($data["id_paket"]);
	$nama_paket = htmlspecialchars($data["nama_paket"]);
	$harga_paket = htmlspecialchars($data["harga_paket"]);

	$query = "UPDATE paket SET
				id_paket = '$id_paket',
				nama_paket = '$nama_paket',
				harga_paket = '$harga_paket'
			  WHERE id_paket = $id_paket
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function ubah_pesanan($data)
{
	global $conn;

	$id_pemesan = htmlspecialchars($data["id_pemesan"]);
	$id_paket = htmlspecialchars($data["id_paket"]);
	$nama_pemesan = htmlspecialchars($data["nama_pemesan"]);
	$nama_paket = htmlspecialchars($data["nama_paket"]);
	$harga_paket = htmlspecialchars($data["harga_paket"]);
	$alamat_pemesan = htmlspecialchars($data["alamat_pemesan"]);
	$no_hp_pemesan = htmlspecialchars($data["no_hp_pemesan"]);
	$status = htmlspecialchars($data["status"]);

	$query = "UPDATE pesanan SET
				id_paket = '$id_paket',
				nama_pemesan = '$nama_pemesan',
				nama_paket = '$nama_paket',
				harga_paket = '$harga_paket',
				alamat_pemesan = '$alamat_pemesan',
				no_hp_pemesan = '$no_hp_pemesan',
				status = '$status'
			  WHERE id_pemesan = $id_pemesan
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

//Fungsi Hapus
function hapus_user($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");
	return mysqli_affected_rows($conn);
}
function hapus_karyawan($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM karyawan WHERE id_karyawan = $id");
	return mysqli_affected_rows($conn);
}
function hapus_paket($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM paket WHERE id_paket = $id");
	return mysqli_affected_rows($conn);
}
function hapus_pesanan($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM pesanan WHERE id_pemesan = $id");
	return mysqli_affected_rows($conn);
}

//Fungsi Cari
function cari_user($keyword)
{
	$query = "SELECT * FROM users
				WHERE
			  nama_user LIKE '%$keyword%' OR
			  username LIKE '%$keyword%' OR
			  alamat_user LIKE '%$keyword%' OR
			  no_hp LIKE '%$keyword%' OR
			  role LIKE '%$keyword%' OR
			  id_user LIKE '%$keyword%'
			";
	return query($query);
}
function cari_karyawan($keyword)
{
	$query = "SELECT * FROM karyawan
				WHERE
			  nama_karyawan LIKE '%$keyword%' OR
			  id_karyawan LIKE '%$keyword%'
			";
	return query($query);
}
function cari_paket($keyword)
{
	$query = "SELECT * FROM paket
				WHERE
			  nama_paket LIKE '%$keyword%' OR
			  harga_paket LIKE '%$keyword%' OR
			  id_paket LIKE '%$keyword%'
			";
	return query($query);
}
function cari_pesanan($keyword)
{
	$query = "SELECT * FROM users
				WHERE
			  id_paket LIKE '%$keyword%' OR	
			  nama_pemesan LIKE '%$keyword%' OR
			  nama_paket LIKE '%$keyword%' OR
			  harga_paket LIKE '%$keyword%' OR
			  alamat_pemesan LIKE '%$keyword%' OR
			  no_hp_pemesan LIKE '%$keyword%' OR
			  status LIKE '%$keyword%' OR
			  id_pemesan LIKE '%$keyword%'
			";
	return query($query);
}
