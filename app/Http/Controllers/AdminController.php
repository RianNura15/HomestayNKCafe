<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.index');
    }

    public function homestay()
    {
        return view('admin.homestay.homestay');
    }

    public function perlengkapan()
    {
        return view('admin.homestay.perlengkapan');
    }

    public function fasilitas()
    {
        return view('admin.homestay.fasilitas');
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
