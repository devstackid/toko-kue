<?php

// Koneksi dan memilih database di server
$conn = mysqli_connect("localhost", "root", "", "cakeshop");
if(mysqli_connect_errno()) {
    echo 'Koneksi ke database belum berhasil '.mysqli_error($conn); 
}
else {
	// echo 'berhasil';
}
?>