<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
 
    <center>
 
        <h2>LAPORAN SEWA</h2>
        <hr />
        <p style="float: right;"><span id="tanggalwaktu"></span></p>
        <p style="float: left;"><span>Periode : {{$tanggal_mulai}} s/d {{$tanggal_selesai}}</span></p>
        <br>
 
    </center>
 
    <table border="1" style="width: 100%">
        <tr>
            <th>No. </th>
            <th>No. Transaksi</th>
            <th>Nama Homestay</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Total</th>
        </tr>

        @if($total == 0)
        <tr>
            <td colspan="8"><center>Data Tidak Ada di Periode {{$tanggal_mulai}} s/d {{$tanggal_selesai}}</center></td>
        </tr>

        @else
                @foreach($data as $item)
        <tr>
            <td style="text-align: center;">{{$loop->iteration}}.</td>
            <td style="text-align: center;">TRS-{{$item->sewa_id}}</td>
            <td style="text-align: center;">{{$item->data_sewa->nama_homestay}}</td>
            <td style="text-align: center;">{{$item->data_sewa->name}}</td>
            <td style="text-align: center;">{{$item->tanggal}}</td>
            <td style="text-align: center;">{{ \Carbon\Carbon::parse($item->data_sewa->tanggal_mulai)->format('d F Y') }}</td>
            <td style="text-align: center;">{{ \Carbon\Carbon::parse($item->data_sewa->tanggal_selesai)->format('d F Y') }}</td>
            <td style="text-align: center;">{{$item->status}}</td>
            <td style="text-align: center;">Rp. {{number_format($item->total,0,",",".")}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8"><b>Subtotal : </b></td>
            <td style="text-align: center;">Rp. {{number_format($total,0,",",".")}}</td>
        </tr>
        @endif
    </table>
 
    <script>
        window.print();
    </script>
    <script>
var tw = new Date();
if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
else (a=tw.getTime());
tw.setTime(a);
var tahun= tw.getFullYear ();
var hari= tw.getDay ();
var bulan= tw.getMonth ();
var tanggal= tw.getDate ();
var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+" Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" WIB ");
</script>
</body>
</html>

