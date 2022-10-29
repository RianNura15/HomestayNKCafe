<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
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
