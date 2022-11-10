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
