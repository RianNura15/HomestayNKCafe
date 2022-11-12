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
                    return redirect('landingpage')->with('login','-');
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
        $data = Homestay::all();
        return view('pelanggan.index', compact('data'));
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
        $homestay = Homestay::where('id_homestay',$id_homestay)->get();
        $data = Homestay::all();
        return view('pelanggan.detailhomestay', compact('data','homestay'));
    }
}
