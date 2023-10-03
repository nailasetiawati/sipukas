<!DOCTYPE html>
<html>
<head>
	<title>Selisih - SIPUKAS</title>
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
 
	<table border="1" id="profit">
		<tr>
			<th>No</th>
			<th>Dana Pemasukan</th>
			<th>Dana Pengeluaran</th>
			<th>Total Selisih</th>
		</tr>
		<tr>
			<td>1</td>
			<td>{{ "Rp " . number_format($totalincome,2,',','.') }}</td>
			<td>{{ "Rp " . number_format($totalexpenses,2,',','.') }}</td>
			<td>{{ "Rp " . number_format($profits,2,',','.') }}</td>
		</tr>
	</table>
    <script src="/modules/jquery.min.js"></script>
	<script src="/js/print.min.js"></script>
    <script>
        $(document).ready(function(){
			printJS('profit', 'html')
		})
    </script>
</body>
</html>