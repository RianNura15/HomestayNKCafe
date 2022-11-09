<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homestay;
use App\Models\DataSewa;
use App\Models\Datauser;
use App\Models\Fasilitas;
use App\Models\GambarHomestay;
use App\Models\Perlengkapan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function login()
    {
        return view('pelanggan.auth.login');
    }

    public function register()
    {
        return view('pelanggan.auth.register');
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
            $users -> level = 'Pelanggan';
            $users -> status = 'Aktif';
            $users -> save();
            Datauser::insert([
                'user_id'=>$users->id,
            ]);
            return redirect('login')->with('regis','-');
        }
    }

    public function home()
    {
        return view('pelanggan.index');
    }

    public function about()
    {
        return view('pelanggan.about');
    }

    public function contactus()
    {
        return view('pelanggan.contactus');
    }
}
