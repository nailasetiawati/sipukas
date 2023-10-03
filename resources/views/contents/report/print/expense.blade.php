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
 
	<table border="1" id="expense">
		<tr>
			<th>No</th>
			<th>Kategori Pengeluaran</th>
			<th>Deskripsi</th>
			<th>Nominal</th>
		</tr>
		@foreach ($expenses as $data)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $data->ExpenseCategory->name }}</td>
				<td>{{ $data->description }}</td>
				<td>{{ "Rp " . number_format($data->nominal,2,',','.') }}</td>
			</tr>
		@endforeach
	</table>
    <script src="/modules/jquery.min.js"></script>
	<script src="/js/print.min.js"></script>
    <script>
        $(document).ready(function(){
			printJS('expense', 'html')
		})
    </script>
</body>
</html>