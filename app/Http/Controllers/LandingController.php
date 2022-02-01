<?php

namespace App\Http\Controllers;

use App\Models\CalonPeserta;
use App\Models\CategoryBiaya;
use App\Models\CategoryPersyaratan;
use Database\Seeders\CategoryPersyaratanSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function syarat_pendaftaran()
    {
        $data['category'] = CategoryPersyaratan::orderBy('id', 'ASC')->get();
        return view('user.syarat_pendaftaran', compact('data'));
    }
    public function jadwal()
    {
        return view('user.jadwal');
    }
    public function biaya()
    {
        $data['category'] = CategoryBiaya::orderBy('id', 'ASC')->get();
        return view('user.biaya', compact('data'));
    }
    public function alur_pendaftaran()
    {
        return view('user.alur_pendaftaran');
    }
    public function cek_status_pendaftaran()
    {
        if (isset($_GET['pencarian'])) {
            $data = DB::table('calon_pesertas as cp')
                ->select(
                    'cp.*',
                    's.*',
                )
                ->join('siswas as s', 's.id', 'cp.id_siswa')
                ->orWhere('s.nama_lengkap', 'like', '%' .  $_GET['pencarian'] . '%')
                ->orWhere('s.nisn', 'like', '%' .  $_GET['pencarian'] . '%')
                ->orWhere('s.nis', 'like', '%' .  $_GET['pencarian'] . '%')
                ->orWhere('cp.no_pendaftaran', 'like', '%' .  $_GET['pencarian'] . '%')
                ->get();
        } else {
            $data = null;
        }
        return view('user.cek_status_daftar', compact('data'));
    }
}
