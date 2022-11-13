<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Homestay;
use App\Models\DataSewa;
use App\Models\Datauser;
use App\Models\Fasilitas;
use App\Models\GambarHomestay;
use App\Models\Perlengkapan;
use App\Models\User;
use App\Models\Bank;
use App\Models\Laporan;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\HomestayRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function cekLogin(LoginAdminRequest $request)
    {
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            if (Auth::user()->status !== "Aktif") {
                Auth::logout();
                return redirect('loginadmin/index');
            }else{
                if (Auth::user()->level == "Admin") {
                    return redirect('/menu');
                }else{
                    return redirect('loginadmin/index');                    
                }
            }
        }else{
            return redirect()->back()->with('salah','-');
        }
    }

    public function register()
    {
        return view('admin.auth.register');
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
            $users -> level = 'Admin';
            $users -> status = 'Aktif';
            $users -> save();
            Datauser::insert([
                'user_id'=>$users->id,
            ]);
            return redirect('loginadmin/index')->with('regis','-');
        }
    }

    public function logout(){
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();
    	return redirect('loginadmin/index');
    }

    public function home()
    {
        return view('admin.index');
    }

    //-----------------------------------------------Homestay----------------------------------------------
    public function homestay(Request $request)
    {
        $data = Homestay::latest()->get();
        return view('admin.homestay.homestay', compact('data'));
    }

    public function add_homestay(HomestayRequest $request)
    {
        $file = $request->file('gambar');
        $image_name = $file->getClientOriginalName();

        if($file){
            $image_name = $file->store('data-homestay', 'public');
        }

        Homestay::create([
            'nama_homestay' => $request->nama_homestay,
            'jenis_homestay' => $request->jenis_homestay,
            'harga' => $request->harga,
            'gambar' => $image_name,
            'desc_homestay' => $request->desc_homestay
        ]);

        return redirect('/homestay/index')->with('success', 'Data Homestay Berhasil Disimpan');
    }

    public function update_homestay(Request $request, $id_homestay)
    {
        $file = $request->file('gambar');
        $image_name = '';

        if($file){
            $image_name = $file->store('data-homestay', 'public');
            if(Storage::exists('public/' . $request->oldImage)){
                Storage::delete('public/' . $request->oldImage);
            }
        }

        if(!empty($request->file('gambar'))){
            Homestay::where('id_homestay', $id_homestay)->update([
                'nama_homestay' => $request->nama_homestay,
                'jenis_homestay' => $request->jenis_homestay,
                'harga' => $request->harga,
                'gambar' => $image_name,
                'desc_homestay' => $request->desc_homestay
            ]);
        }else{
            Homestay::where('id_homestay', $id_homestay)->update([
                'nama_homestay' => $request->nama_homestay,
                'jenis_homestay' => $request->jenis_homestay,
                'harga' => $request->harga,
                'desc_homestay' => $request->desc_homestay
            ]);
        }

        return redirect()->back()->with('success', 'data berhasil diupdate');
    }

    public function delete_homestay($id_homestay){
       Homestay::where('id_homestay', $id_homestay)->delete();
       return redirect()->back()->with('toast_success', 'Berhasil Menghapus Data');
    }

    public function perlengkapan($id_homestay)
    {
        $data = Perlengkapan::with('homestay')->where('perlengkapans.homestay_id', $id_homestay)->latest()->get();
        $homestay = Homestay::where('homestays.id_homestay', $id_homestay)->get();
        return view('admin.homestay.perlengkapan', compact('data','homestay'));
    }

    public function add_perlengkapan(Request $request)
    {
        $file = $request->file('gambar');
        $image_name = $file->getClientOriginalName();

        if($file){
            $image_name = $file->store('data-perlengkapan', 'public');
        }

        Perlengkapan::create([
            'nama_perlengkapan' => $request->nama_perlengkapan,
            'homestay_id' => $request->homestay_id,
            'jumlah_perlengkapan' => $request->jumlah_perlengkapan,
            'tempat' => $request->tempat,
            'desc_perlengkapan' => $request->desc_perlengkapan,
            'gambar' => $image_name
        ]);

        return redirect()->back()->with('success', 'Data Homestay Berhasil Disimpan');
    }

    public function update_perlengkapan(Request $request, $id_fperlengkapan)
    {
        $file = $request->file('gambar');
        $image_name = '';

        if($file){
            $image_name = $file->store('data-perlengkapan', 'public');
            if(Storage::exists('public/' . $request->oldImage)){
                Storage::delete('public/' . $request->oldImage);
            }
        }

        if(!empty($request->file('gambar'))){
            Perlangkapan::where('id_perlangkapan', $id_perlangkapan)->update([
                'nama_perlengkapan' => $request->nama_perlengkapan,
                'homestay_id' => $request->homestay_id,
                'jumlah_perlengkapan' => $request->jumlah_perlengkapan,
                'tempat' => $request->tempat,
                'desc_perlengkapan' => $request->desc_perlengkapan,
                'gambar' => $image_name
            ]);
        }else{
            Perlangkapan::where('id_perlangkapan', $id_perlangkapan)->update([
                'nama_perlengkapan' => $request->nama_perlengkapan,
                'homestay_id' => $request->homestay_id,
                'jumlah_perlengkapan' => $request->jumlah_perlengkapan,
                'tempat' => $request->tempat,
                'desc_perlengkapan' => $request->desc_perlengkapan
            ]);
        }

        return redirect()->back()->with('success', 'data berhasil diupdate');
    }

    public function delete_perlengkapan($id_perlengkapan){
       Perlengkapan::where('id_perlengkapan', $id_perlengkapan)->delete();
       return redirect()->back()->with('toast_success', 'Berhasil Menghapus Data');
    }

    public function fasilitas($id_homestay)
    {
        $data = Fasilitas::with('homestay')->where('fasilitas.homestay_id', $id_homestay)->latest()->get();
        $homestay = Homestay::where('homestays.id_homestay', $id_homestay)->get();
        return view('admin.homestay.fasilitas', compact('data','homestay'));
    }

    public function add_fasilitas(Request $request)
    {
        $file = $request->file('gambar');
        $image_name = $file->getClientOriginalName();

        if($file){
            $image_name = $file->store('data-fasilitas', 'public');
        }

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'homestay_id' => $request->homestay_id,
            'jumlah_fasilitas' => $request->jumlah_fasilitas,
            'desc_fasilitas' => $request->desc_fasilitas,
            'gambar' => $image_name
        ]);

        return redirect()->back()->with('success', 'Data Homestay Berhasil Disimpan');
    }

    public function update_fasilitas(Request $request, $id_fasilitas)
    {
        $file = $request->file('gambar');
        $image_name = '';

        if($file){
            $image_name = $file->store('data-fasilitas', 'public');
            if(Storage::exists('public/' . $request->oldImage)){
                Storage::delete('public/' . $request->oldImage);
            }
        }

        if(!empty($request->file('gambar'))){
            Fasilitas::where('id_fasilitas', $id_fasilitas)->update([
                'nama_fasilitas' => $request->nama_fasilitas,
                'homestay_id' => $request->homestay_id,
                'jumlah_fasilitas' => $request->jumlah_fasilitas,
                'desc_fasilitas' => $request->desc_fasilitas,
                'gambar' => $image_name
            ]);
        }else{
            Fasilitas::where('id_fasilitas', $id_fasilitas)->update([
                'nama_fasilitas' => $request->nama_fasilitas,
                'homestay_id' => $request->homestay_id,
                'jumlah_fasilitas' => $request->jumlah_fasilitas,
                'desc_fasilitas' => $request->desc_fasilitas
            ]);
        }

        return redirect()->back()->with('success', 'data berhasil diupdate');
    }

    public function delete_fasilitas($id_fasilitas){
       Fasilitas::where('id_fasilitas', $id_fasilitas)->delete();
       return redirect()->back()->with('toast_success', 'Berhasil Menghapus Data');
    }

    public function datasewa()
    {
        $data = DataSewa::with('user','homestay')->latest()->get();
        return view('admin.sewa.sewa', compact('data'));
    }

    public function laporan()
    {
        $data = Laporan::latest()->get();
        return view('admin.sewa.laporan', compact('data'));
    }

    public function datauser()
    {
        $data = User::with('datauser')->where('level','Pelanggan')->latest()->get();
        return view('admin.user.user', compact('data'));
    }

}
