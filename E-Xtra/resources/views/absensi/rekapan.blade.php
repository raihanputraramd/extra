<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Disini tuh inginnya muncul data umum pertemuan kita
<br>
Jumlah Pertemuan : 0 -> tolong jadiin card
<br>	
<br>
<table>
	<thead>
		<tr>
			<th>Tanggal Pertemuan</th>
			<th>Kegiatan</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pertemuan as $data)
		<tr>
			<td>{{$data->tanggal}}</td>
			<td>{{$data->kegiatan}}</td>
			<td>
				<a href="{{ url('/absensi/rekapan/pertemuan',$data->id) }}">DETAIL</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>