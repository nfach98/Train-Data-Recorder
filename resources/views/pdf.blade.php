<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>

    <style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}
	</style>
</head>

<body>
	<center>
		<h1>LAPORAN DATA RECORD PERJALANAN KERETA LRT</h1>
	</center>

	<h2 style="margin-top: 2rem;">Nama: {{ $train->nama }}</h2>
	<h2>ID: {{ $train->id }}</h2>

	<table border="1" style="width: 100%;">
		<tr>
			<th>Tanggal</th>
			<th>Kemiringan</th>
			<th>Suhu bearing</th>
			<th>Kecepatan</th>
			<th>Tegangan</th>
			<th>Arus</th>
			<th>Frekuensi</th>
			<th>Daya</th>
			<th>Energi</th>
			<th>Latitude</th>
			<th>Longitude</th>
		</tr>
		@foreach ($data as $dt)
			<tr>
				<td>{{ $dt->time }}</td>
				<td>{{ $dt->kemiringan }}</td>
				<td>{{ $dt->suhu_bearing }}</td>
				<td>{{ $dt->kecepatan }}</td>
				<td>{{ $dt->tegangan }}</td>
				<td>{{ $dt->arus }}</td>
				<td>{{ $dt->frekuensi }}</td>
				<td>{{ $dt->daya }}</td>
				<td>{{ $dt->energi }}</td>
				<td>{{ $dt->latitude }}</td>
				<td>{{ $dt->longitude }}</td>
			</tr>
		@endforeach
	</table>
</body>

</html>