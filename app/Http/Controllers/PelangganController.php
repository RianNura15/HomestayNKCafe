<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Homestay;
use App\Models\DataSewa;
use App\Models\Datauser;
use App\Models\Fasilitas;
use App\Models\GambarHomestay;
use App\Models\Perlengkapan;
use App\Models\User;
use App\Http\Requests\LoginPelangganRequest;
use App\Http\Requests\RegisPelangganRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function login()
    {
        return view('pelanggan.auth.login');
    }

    public function cekLogin(LoginPelangganRequest $request)
    {
        if (Auth::attempt(['email' => $request -> email,'password' => $request -> password])) {
            if (Auth::user()->status !== "Aktif") {
                Auth::logout();
                return redirect('login/index')->with('non-aktif','-');
            }else{
                if (Auth::user()->level == "Pelanggan") {
                    return redirect('/')->with('login','-');
                }else{
                    return redirect('login/index');                    
                }
            }
        }else{
            return redirect()->back()->with('salah','-');
        }
    }

    public function register()
    {
        return view('pelanggan.auth.register');
    }

    public function addreg(RegisPelangganRequest $request)
    {
        $cek = User::where('email', $request->email)->first();
        if ($cek) {
            return redirect()->back()->with('-');
        }else {
            $users = new User();
            $users -> name = $request -> name;
            $users -> email = $request -> email;
            $users -> password = Hash::make($request -> password);
            $users -> level = 'Pelanggan';
            $users -> status = 'Aktif';
            $users -> save();
            Datauser::insert([
                'user_id'=>$users->id,
            ]);
            return redirect('login')->with('regis','-');
        }
    }

    public function logout(){
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();
    	return redirect('login/index');
    }

    public function home()
    {
        $data = Homestay::with('fasilitas')->get();
        return view('pelanggan.index', compact('data'));
    }

    public function profil()
    {
        $profil = User::with('datauser')->where('id', Auth::user()->id)->first();
        $data = Homestay::all();
        return view('pelanggan.profil', compact('data','profil'));
    }

    public function updateprofil(Request $request)
    {
        $file = $request->file('gambar_ktp');
        $image_name = '';

        if($file){
            $image_name = $file->store('data-ktpuser', 'public');
            if(Storage::exists('public/' . $request->oldImage)){
                Storage::delete('public/' . $request->oldImage);
            }
        }

        if(!empty($request->file('gambar_ktp'))){
            Datauser::where('user_id', Auth::user()->id)->update([
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat_user' => $request->alamat_user,
                'gambar_ktp' => $image_name
            ]);
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect()->back();
        }else{
            Datauser::where('user_id', Auth::user()->id)->update([
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat_user' => $request->alamat_user
            ]);
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect()->back();
        }
    }

    public function about()
    {
        $data = Homestay::all();
        return view('pelanggan.about', compact('data'));
    }

    public function contactus()
    {
        $data = Homestay::all();
        return view('pelanggan.contactus', compact('data'));
    }

    public function detailhomestay($id_homestay)
    {
        $tb = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Taman Belakang')->get();
        $rk = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Ruang Keluarga')->get();
        $rm = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Ruang Makan')->get();
        $rt = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Ruang Tamu')->get();
        $dp = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Dapur')->get();
        $km = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Kamar Mandi')->get();
        $kt = Fasilitas::where('homestay_id', $id_homestay)->where('nama_fasilitas','Kamar Tidur')->get();
        $homestay = Homestay::where('id_homestay',$id_homestay)->get();
        $data = Homestay::all();
        $fasilitas = Fasilitas::where('homestay_id', $id_homestay)->get();
        return view('pelanggan.detailhomestay', compact('data','homestay','fasilitas','kt','km','dp','rt','rm','rk','tb'));
    }
}
