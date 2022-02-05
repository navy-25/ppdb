<?php

namespace App\Http\Controllers;

use App\Models\CalonPeserta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $chart['agama'] = CalonPeserta::where('jurusan', 'Agama')->count();
        $chart['mipa'] = CalonPeserta::where('jurusan', 'MIPA')->count();
        $chart['ips'] = CalonPeserta::where('jurusan', 'IPS')->count();

        $chart['undangan'] = CalonPeserta::where('jalur', 'Undangan')->count();
        $chart['regular'] = CalonPeserta::where('jalur', 'Regular')->count();

        $chart['total_pendaftar'] = CalonPeserta::count();
        $chart['lulus'] = CalonPeserta::where('status', 'Lulus')->count();
        $chart['tidak_lulus'] = CalonPeserta::where('status', 'Tidak Lulus')->count();

        $kalender = CAL_GREGORIAN;
        $bulan = (int)date('m');
        $tahun = (int)date('Y');

        $hari = cal_days_in_month($kalender, $bulan, $tahun);
        $data['hari'] = [];
        $data['pendaftar'] = [];
        for ($i = 1; $i <= $hari; $i++) {
            $data['hari'][] = $i;
            $data['pendaftar'][] = CalonPeserta::where('created_at', 'like', '%' . $tahun . '-' . sprintf("%02s", $bulan) . '-' . sprintf("%02s", $i) . '%')->count();
        }
        return view('admin.dashboard', compact('chart', 'data'));
    }
}
