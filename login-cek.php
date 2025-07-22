<?php

  include 'inc/inc-mis-core.php';
  include 'function/fun.php';

// ambil data hasil submit dari form
/* $username = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password'])))));
 */

$username =htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: login.php?alert=1");
}
else {
	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($conn, "SELECT u.*,a.nama_hakakses,c.nama_cabang FROM tbl_user u inner join tbl_hakakses a on u.hakakses=a.kode_hakakses
	inner join tbl_cabang c on u.id_cabang=c.id_cabang
	 WHERE u.username='$username' AND u.password='$password'")
									or die('Ada kesalahan pada query user: '.mysqli_error($conn));
	$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['id_cabang']   = $data['id_cabang'];
		$_SESSION['nama_lengkap']  = $data['nama_lengkap'];
		$_SESSION['hak_akses']  = $data['hakakses'];
		$_SESSION['nama_cabang'] = $data['nama_cabang'];
		
		
		// lalu alihkan ke halaman user
		header("Location: ?module=GeneralDashboard");
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	else {
		header("Location: login.php?alert=1");
	}
}
?>