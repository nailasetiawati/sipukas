<!DOCTYPE html>
<html>
<head>
	<title>Dana Pengeluaran - SIPUKAS</title>
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
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Selisih $now - SIPUKAS.xls");
	?>
 
	<center>
		<h1>Dana Pengeluaran - SIPUKAS</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Dana Pemasukan</th>
			<th>Dana Pengeluaran</th>
			<th>Total Selisih</th>
		</tr>
	</table>
</body>
</html>