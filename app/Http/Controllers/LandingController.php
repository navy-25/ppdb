<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function syarat_pendaftaran()
    {
        return view('user.syarat_pendaftaran');
    }
    public function jadwal()
    {
        return view('user.jadwal');
    }
    public function biaya()
    {
        return view('user.biaya');
    }
    public function alur_pendaftaran()
    {
        return view('user.alur_pendaftaran');
    }
    public function cek_status_pendaftaran()
    {
        return view('user.cek_status_daftar');
    }
}
