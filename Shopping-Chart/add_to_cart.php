<?php 
include "Koneksi.php";

session_start();
$sql = "SELECT * FROM tbl_barang WHERE kode_barang = '".$_GET['id']."' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$isi_cart = 0;

if($_SESSION['nama_barang'] == ''){
	$_SESSION['nama_barang'] = array();
	$_SESSION['quantity'] = array();
	$_SESSION['harga'] = array();	
	$_SESSION['nama_barang'][$isi_cart] = $row['nama_barang'];
	$_SESSION['quantity'][$isi_cart] = 1;
	$_SESSION['harga'][$isi_cart] = $row['harga'];
}else{
	$isi_cart = count($_SESSION['nama_barang']);
	$_SESSION['nama_barang'][$isi_cart] = $row['nama_barang'];
	$_SESSION['quantity'][$isi_cart] = 1;
	$_SESSION['harga'][$isi_cart] = $row['harga'];
}

header('location:display_aos_cart.php')
?>