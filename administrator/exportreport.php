<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=All Transaction From".date("Y/m/d").".xls");
?>

<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
	<center>
		<h1>Export Penjualan per </h1>
	</center>
 
	
 
	<table>
		<tr>
			<th>Nomor Invoice</th>
			<th>Nama Pembeli</th>
			<th>Email</th>
            <th>Nomor Telpon</th>
            <th>Nama Product</th>
            <th>QTY</th>
            <th>Harga Satuan</th>
            
            <th>Status</th>
        </tr>
        
        <?php
            include 'admin_connection.php';
            $sql = "SELECT cart.*, product.*, users.*, address.*, tb_provinsi.*, tb_regencies.*, tb_kelurahan.*, tb_kecamatan.* from cart LEFT JOIN product ON product.product_id = cart.product_id LEFT JOIN users ON cart.user_id = users.user_id LEFT JOIN address ON address.address_id = users.address_id LEFT JOIN tb_provinsi ON address.provinsi_id = tb_provinsi.index_provinsi LEFT JOIN tb_regencies ON tb_regencies.index_regencies = address.kota_id LEFT JOIN tb_kelurahan ON tb_kelurahan.index_kelurahan = address.kelurahan_id LEFT JOIN tb_kecamatan ON tb_kecamatan.index_kecamatan = address.kecamatan_id";
            $sth = $db->prepare($sql);
            $sth->execute();
            while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) {
        ?>
		<tr>
			<td><?php echo $row['invoice_id'] ?></td>
            <td><?php echo $row['first_name']." ".$row['second_name'] ?></td>
            <td><?php echo $row['email'] ?></td>
			<td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['product_name'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td><?php echo $row['price_each'] ?></td>
            <td><?php 
                    $status = $row['status'];
                    if($status =="0"){
                        $status = "Cart";
                    } else if ($status == "1"){
                        $status = "Menunggu Konfirmasi";
                    } else if($status =="2"){
                        $status = "Pembayaran di terima";
                    } else if ($status == "3"){
                        $status = "Pengiriman";
                    } else if ($status =="4"){
                        $status = "Order di tolak";
                    }else if ($status =="5"){
                        $status = "Order Selesai";
                    }
                    echo $status;                            
                ?>
            </td>
        </tr>
        <?php } ?>
		
	</table>
</body>
</html>