<html>
<head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DATABASE TOKO</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/jquery.js"></script> 
    <script src="bootstrap/js/popper.js"></script> 
    <script src="bootstrap/js/bootstrap.js"></script> 
</head>

	<body>
	<div class = "container">
		<h2 align = "center"> DATABASE TOKO </h2>
		
		<form method="POST">
			<label>Input yang dicari : </label>
			<input type="text" name="cari" class="rounded-pill">
			<button class="rounded-pill btn-info" >Cari</button>
		</form>
	
		<table class="table table-bordered table-striped table-hover" cellpadding="5">
		<style type ="text/css">
                    /* ini buat thead **/
                    .table-striped > thead > tr:nth-child(odd) > td, 
                    .table-striped > thead > tr:nth-child(odd) > th {
                        background-color: #ffffff;
                    }

                    /* ini buat tbody **/
                    .table-striped > tbody > tr:nth-child(odd) > td, 
                    .table-striped > tbody > tr:nth-child(odd) > th {
                        background-color: #aad8d3;
                    }
                    .table-striped > tbody > tr:nth-child(even) > td, 
                    .table-striped > tbody > tr:nth-child(even) > th {
                        background-color: #eeeeee;
                    }
                </style>
		<thead class = "bg-dark text-center">		
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Masukkan Ke Keranjang</th>			
		</tr>
		</thead>
		<tbody>
		<?php
		
			include "Koneksi.php";	
		
			if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
				echo "<br>Hasil pencarian : <b>" .$cari. "</b>";
                $query = "SELECT * FROM  tbl_barang WHERE nama_barang LIKE '%".$cari."%' ORDER BY kode_barang ASC";
            } else {
                $query = "SELECT * FROM tbl_barang ORDER BY kode_barang ASC";
            }
            
            $result = mysqli_query($conn, $query);
            $no=1;

            if(!$result) {
				die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
			}

            while($row = mysqli_fetch_assoc ($result)){
        ?>		
		<tr class="text-center">
			<td> <?php echo $row["kode_barang"] ?> </td>
			<td> <?php echo $row["nama_barang"] ?> </td>
			<td> <?php echo $row["harga"] ?> </td>
			<td> <img src = "img/<?php echo $row["foto"]; ?>" height="100" width="100"> </td>
			<td> <a href="add_to_cart.php?id=<?php echo $row['kode_barang']?>" class="btn btn-primary"> <i class="bi bi-plus"></i> Ya </a> </td>
		</tr>
		<?php
			}
		?>
		</tbody>
		</table>
		<iframe name="detailFrame" style="border:none" width="250" height="300"></iframe>
		</div>
	</body>
</html>