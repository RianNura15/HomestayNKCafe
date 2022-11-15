@if(session('daftarmember'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Selamat, Pendaftaran Berhasil",
		text: "Kamu Sudah Menjadi Member, Nikmati Keuntungannya",
	});
</script>
@endif
@if(session('salahprofil'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Gagal Mengubah Data",
		text: "Email Harus @gmail.com"
	});
</script>
@endif
@if(session('gantilevel'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menyetujui Akun",
	});
</script>
@endif
@if(session('jenisadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data",
	});
</script>
@endif
@if(session('jenisup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Jenis Berhasil di Ubah.",
	});
</script>
@endif
@if(session('jenisdel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Jenis Berhasil di Hapus.",
	});
</script>
@endif
@if(session('setting'))
<script type="text/javascript">
    document.getElementById('success');
    Swal.fire({
        icon: "success",
        title: "Berhasil Setting Profil"
    });
</script>
@endif

@if(session('addbank'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Bank",
	});
</script>
@endif
@if(session('updatebank'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Bank Berhasil di Ubah.",
	});
</script>
@endif
@if(session('deletebank'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Data Bank Berhasil di Hapus",
	});
</script>
@endif

@if(session('addfasilitas'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Fasilitas",
	});
</script>
@endif
@if(session('updatefasilitas'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Fasilitas Berhasil di Ubah.",
	});
</script>
@endif
@if(session('deletefasilitas'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Delete Data",
		text: "Data Fasilitas Berhasil di Hapus.",
	});
</script>
@endif

@if(session('addhomestay'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Homestay",
	});
</script>
@endif
@if(session('updatehomestay'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Homestay Berhasil di Ubah.",
	});
</script>
@endif
@if(session('deletehomestay'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Homestay Berhasil di Hapus.",
	});
</script>
@endif

@if(session('karyawanadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Karyawan",
	});
</script>
@endif
@if(session('karyawanup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Karyawan Berhasil di Ubah.",
	});
</script>
@endif
@if(session('karyawandel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Karyawan Berhasil di Hapus",
	});
</script>
@endif

@if(session('peralatanadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Peralatan",
	});
</script>
@endif
@if(session('peralatanup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Peralatan Berhasil di Ubah.",
	});
</script>
@endif
@if(session('peralatandel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Peralatan Berhasil di Hapus",
	});
</script>
@endif

@if(session('diskonadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Diskon",
	});
</script>
@endif
@if(session('diskonup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Diskon Berhasil di Ubah.",
	});
</script>
@endif
@if(session('diskondel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Diskon Berhasil di Hapus",
	});
</script>
@endif

@if(session('paymentadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Payment",
	});
</script>
@endif
@if(session('paymentup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Payment Berhasil di Ubah.",
	});
</script>
@endif
@if(session('paymentdel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Payment Berhasil di Hapus.",
	});
</script>
@endif

@if(session('updatestatus'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Ubah Status",
		text: "Data Status User Berhasil di Ubah.",
	});
</script>
@endif

@if(session('digunakan'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Lapangan Sudah di Booking",
		text: "Silahkan Cari Jam Lain"
	});
</script>
@endif

@if(session('digunakanpb'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Lapangan Sudah di Booking",
		text: "Silahkan Cari Jam Lain"
	});
</script>
@endif

@if(session('addkegiatan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Kegiatan"
	});
</script>
@endif

@if(session('addbokingpb'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Lapangan Berhasil Dipesan"
	});
</script>
@endif

@if(session('addbooking'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Homestay Berhasil Dipesan",
		text: "Segera Mengirim Bukti Pembayaran saat tombol bayar muncul!"
	});
</script>
@endif

@if(session('sewadel'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Hapus Data",
		text: "Data Sewa Berhasil di Hapus.",
	});
</script>
@endif

@if(session('updateprofil'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menyimpan Data",
		text: "Data Profil Berhasil di Simpan.",
	});
</script>
@endif

@if(session('keterangan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Ubah Keterangan",
	});
</script>
@endif

@if(session('batal'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Membatalkan Transaksi Sewa",
	});
</script>
@endif

@if(session('bataluser'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Membatalkan Persetujuan User",
	});
</script>
@endif

@if(session('batalkan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Membatalkan Transaksi Sewa",
	});
</script>
@endif

@if(session('selesai'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Penyewaan Selesai",
	});
</script>
@endif

@if(session('buktipembayaran'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Upload Pembayaran",
		text: "Tunggu Konfirmasi dari Admin.",
	});
</script>
@endif

@if(session('setuju'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menyetujui",
		text: "Penyewaan di Setujui",
	});
</script>
@endif

@if(session('konfirmasi'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Confirm",
		text: "Penyewaan di Konfirmasi",
	});
</script>
@endif

@if(session('pembayaran'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Mengirim Data",
		text: "Data Transaksi berhasil di Terkirim",
	});
</script>
@endif

@if(session('oketgl'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Data Berhasil",
		text: "Berhasil Ubah Waktu Penyewaan",
	});
</script>
@endif

@if(session('salah'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Gagal Login",
		text: "Username dan Password tidak sesuai."
	});
</script>
@endif
@if(session('sama'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Username Sama",
		text: "Username tersebut telah di Gunakan."
	});
</script>
@endif
@if(session('non-aktif'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Username Tidak Aktif",
		text: "Username telah di Non-Aktif kan."
	});
</script>
@endif

@if(session('loginmember'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Selamat Datang",
		text: "Anda Berhasil Login"
	});
</script>
@endif
@if(session('regismember'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Registrasi",
		text: "Silahkan Melakukan Login Untuk Masuk"
	});
</script>
@endif

@if(session('loginpelanggan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Selamat Datang",
		text: "Anda Berhasil Login"
	});
</script>
@endif
@if(session('regispelanggan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Registrasi",
		text: "Silahkan Melakukan Login Untuk Masuk"
	});
</script>
@endif

@if(session('login'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Selamat Datang",
		text: "Anda Berhasil Login"
	});
</script>
@endif
@if(session('regis'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Registrasi",
		text: "Silahkan Melakukan Login Untuk Masuk"
	});
</script>
@endif
