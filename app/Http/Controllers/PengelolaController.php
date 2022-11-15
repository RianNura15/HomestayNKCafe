<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Homestay;
use App\Models\DataSewa;
use App\Models\Datauser;
use App\Models\User;
use App\Models\Laporan;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Storage;

class PengelolaController extends Controller
{
    public function login()
    {
        return view('pengelola.auth.login');
    }

    public function cekLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            if (Auth::user()->status !== "Aktif") {
                Auth::logout();
                return redirect('loginpengelola/index')->with('non-aktif','-');
            }else{
                if (Auth::user()->level == "Pengelola") {
                    return redirect('/menupengelola')->with('login','-');
                }else{
                    return redirect('loginpengelola/index');                    
                }
            }
        }else{
            return redirect()->back()->with('salah','-');
        }
    }

    public function register()
    {
        return view('pengelola.auth.register');
    }
    
    public function addreg(Request $request)
    {
        $cek = User::where('email', $request->email)->first();
        if ($cek) {
            return redirect()->back()->with('-');
        }else {
            $users = new User();
            $users -> name = $request -> name;
            $users -> email = $request -> email;
            $users -> password = Hash::make($request -> password);
            $users -> level = 'Pengelola';
            $users -> status = 'Aktif';
            $users -> save();
            Datauser::insert([
                'user_id'=>$users->id,
            ]);
            return redirect('loginpengelola/index')->with('regis','-');
        }
    }

    public function logout(){
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();
    	return redirect('loginpengelola/index');
    }

    public function home()
    {
        $aktif = DataSewa::where('keterangan','Aktif')->count();
        $user = User::where('level','Pelanggan')->count();
        $pemasukan = Laporan::sum('total');
        $pending = DataSewa::where('keterangan','Pending')->count();
        return view('pengelola.index', compact('aktif','user','pemasukan','pending'));
    }

    public function datasewa()
    {
        $data = DataSewa::with('user','homestay')->latest()->get();
        return view('pengelola.sewa.sewa', compact('data'));
    }

    public function laporan()
    {
        $data = Laporan::with('data_sewa')->latest()->get();
        $total = Laporan::sum('total');
        return view('pengelola.sewa.laporan', compact('data','total'));
    }

    public function cetaklaporan(Request $request)
	{
		$tanggal_mulai = $request->tanggal_mulai;
		$tanggal_selesai = $request->tanggal_selesai;

		if($tanggal_mulai AND $tanggal_selesai){
			$data = Laporan::with('data_sewa')->whereBetween('tanggal',[$tanggal_mulai, $tanggal_selesai])->get();
			$total = Laporan::whereBetween('tanggal', [$tanggal_mulai, $tanggal_selesai])->sum('total');
		}else{
			$data = Laporan::with('data_sewa')->get();
		}
		return view('pengelola.sewa.cetaklaporan', compact('data','total','tanggal_mulai','tanggal_selesai'));
	}

    public function karyawan()
    {
        $data = Karyawan::latest()->get();
        return view('pengelola.karyawan.karyawan', compact('data'));
    }

    public function add_karyawan(Request $request)
    {
        $file = $request->file('gambar_ktp');
        $image_name = $file->getClientOriginalName();

        if($file){
            $image_name = $file->store('ktp-karyawan', 'public');
        }

        $cek = User::where('email', $request->email)->first();
        if ($cek) {
            return redirect()->back()->with('sama','-');
        }else {
            $users = new User();
            $users -> name = $request -> nama_karyawan;
            $users -> email = $request -> email;
            $users -> password = Hash::make($request -> password);
            $users -> level = 'Admin';
            $users -> status = 'Aktif';
            $users -> save();
    
            Datauser::insert([
                'user_id' => $users->id,
            ]);
        }

        Karyawan::create([
            'user_id' => $users->id,
            'nama_karyawan' => $request->nama_karyawan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'gambar_ktp' => $image_name,
            'no_telp' => $request->no_telp
        ]);

        return redirect('/karyawan/index')->with('addkaryawan', '-');
    }

    public function update_homestay(Request $request, $id_karyawan)
    {
        $file = $request->file('gambar_ktp');
        $image_name = '';

        if($file){
            $image_name = $file->store('ktp-karyawan', 'public');
            if(Storage::exists('public/' . $request->oldImage)){
                Storage::delete('public/' . $request->oldImage);
            }
        }

        if(!empty($request->file('gambar'))){
            Karyawan::where('id_karyawan', $id_karyawan)->update([
                'nama_karyawan' => $request->nama_karyawan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'gambar_ktp' => $image_name,
                'no_telp' => $request->no_telp
            ]);
        }else{
            Karyawan::where('id_karyawan', $id_karyawan)->update([
                'nama_karyawan' => $request->nama_karyawan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'no_telp' => $request->no_telp
            ]);
        }

        return redirect()->back()->with('updatekaryawan', '-');
    }

    public function delete_karyawan($id_karyawan){
       Karyawan::where('id_karyawan', $id_karyawan)->delete();
       return redirect()->back()->with('deletekaryawan', '-');
    }
}
