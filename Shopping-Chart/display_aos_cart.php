<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/jquery.js"></script> 
    <script src="bootstrap/js/popper.js"></script> 
    <script src="bootstrap/js/bootstrap.js"></script> 
	<style type="text/css">
		.table-color>tbody>tr>th{
			background-color: #242422;
			color : white;
		} 
		.table-color>tbody>tr:nth-child(odd)>td{
	   		background-color: #E0FFFF; 
	 	}
	 	.table-color>tbody>tr:nth-child(even)>td{
	   		background-color: #FFFACD; 
	   	}
	   	.table-center td,th{
	   		text-align: center;
	   	}
	   	.row.a{
	   		margin-left: auto;
	   		width: 350px;
	   	}
	   	.row {
	   		width: 105%;
	   	}
	  </style>
	<title></title>
</head>
<body>
	<table border="1" class="table table-striped table-color border-dark table-center">
			<tr>
				<th>Nama Barang</th>
				<th>Quantity</th>
				<th>Harga Barang</th>
				<th>Sub Total Harga</th>
			</tr>
			<?php $i = 0;?>
			<?php if($_SESSION['nama_barang'][0] != ''): ?>
				<?php while($i<count($_SESSION['nama_barang'])): ?>
					<tr>
						<td><?= $_SESSION['nama_barang'][$i] ?></td>
						<td><?= $_SESSION['quantity'][$i]?></td>
						<td><?= $_SESSION['harga'][$i] ?></td>
						<td><?= $_SESSION['quantity'][$i] * $_SESSION['harga'][$i] ?></td>
					</tr>
					<?php $i = $i + 1 ;?>
				<?php endwhile; ?>	
			<?php else: ?>
				<tr>
					<td colspan=4 >Data Kosong</td>
				</tr>
			<?php endif; ?>
		</table>
	<a href="table_aos.php" class="btn btn-primary">Kembali Belanja</a>
	<a href="destroy.php" class="btn btn-primary">Hapus Isi Keranjang</a>
</body>
</html>