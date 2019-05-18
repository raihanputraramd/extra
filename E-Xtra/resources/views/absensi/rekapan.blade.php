<!DOCTYPE html>
<html>
<head>
	<title>Rekapan Pertemuan</title>
</head>
<link rel="icon" href="{{ asset('img/logo.png') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
    .my-custom-scrollbar {
    position: relative;
    height: 425px;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
	}
</style>
<body style="background-color: #006494; overflow-x: hidden;">
        @extends('layouts.app')

        <div class="container">
            <div class="row">
                    @section('content')
            </div>

            <div class="row">
                <div class="col"><a class="btn btn-secondary" href="{{ url('/absensi') }}">MENUJU ABSENSI</a></div>
                
                <div class="col">
                    <div class="card">
                        <img class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title text-center">Jumlah Pertemuan : {{ $pertemuan->COUNT('id') }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col"></div>
            </div>


            <input type="text" name="search" id="search" class="form-control" placeholder="Search Nama Siswa" />
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="my-custom-scrollbar table-wrapper-scroll-y">
                            <table class="table table-dark table-striped rounded">
                                <thead>
                                    <tr>
                                        <th>Tanggal Pertemuan</th>
                                        <th>Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pertemuan as $data)
                                    <tr>
                                        <td>{{$data->tanggal}}</td>
                                        <td>{{$data->kegiatan}}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="{{ url('/absensi/rekapan/pertemuan',$data->id) }}">DETAIL</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            @endsection

</div>
</body>
<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('pertemuan.search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
</html>