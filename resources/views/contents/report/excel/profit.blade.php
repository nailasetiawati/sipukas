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
 
 @php
		if (Request::get('date') != null) {
			$date = Request::get('date');
		}else {
			$date = Carbon\Carbon::now()->format('Y-m-d');
		}
	@endphp
@if ($date != null)	
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Selisih_SIPUKAS_$date.xls");
?>
@else
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Selisih_SIPUKAS.xls");
?>
@endif
 
	<center>
		<h5>Selisih - SIPUKAS (@php echo $date @endphp)</h5>
	</center>
 
	<table border="1">
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
</body>
</html>