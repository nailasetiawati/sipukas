<!DOCTYPE html>
<html>
<head>
	<title>Dana Pemasukan - SIPUKAS</title>
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
	header("Content-Disposition: attachment; filename=Dana_Pemasukan_SIPUKAS_$date.xls");
	?>
	@else
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Dana_Pemasukan_SIPUKAS.xls");
	?>
	@endif
 
 
	<center>
		<h5>Dana Pemasukan - SIPUKAS (@php echo $date @endphp)</h5>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
            <th>Nama Donatur</th>
            <th>Kategori Donatur</th>
            <th>Nominal</th>
		</tr>
		@foreach ($incomes as $data)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $data->donor_name }}</td>
				<td>{{ $data->DonorsCategory->name }}</td>
				<td>{{ "Rp " . number_format($data->nominal,2,',','.') }}</td>
			</tr>
		@endforeach
	</table>
</body>
</html>