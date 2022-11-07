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
use App\Http\Requests\HomestayRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.index');
    }

    //-------------------------------------------------Homestay------------------------------------------------

    public function homestay(Request $request)
    {
        if ($request->has('search')) {
            $data = Homestay::where('nama_homestay','LIKE','%' .$request->search.'%')->paginate(10);
        }else{
            $data = Homestay::latest()->paginate(10);
        }
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

    public function fasilitas($id_homestay)
    {
        $data = Fasilitas::with('homestay')->where('fasilitas.homestay_id', $id_homestay)->latest()->get();
        $homestay = Homestay::where('homestays.id_homestay', $id_homestay)->get();
        return view('admin.homestay.fasilitas', compact('data','homestay'));
    }

    public function datasewa()
    {
        return view('admin.sewa.sewa');
    }

    public function laporan()
    {
        return view('admin.sewa.laporan');
    }

    public function datauser()
    {
        return view('admin.user.user');
    }
}
