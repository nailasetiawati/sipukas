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
    <script>
        window.print();
    </script>
</body>
</html>