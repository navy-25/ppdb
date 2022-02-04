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
        $chart['agama'] = CalonPeserta::where('jurusan', 'Agama')->count();
        $chart['mipa'] = CalonPeserta::where('jurusan', 'MIPA')->count();
        $chart['ips'] = CalonPeserta::where('jurusan', 'IPS')->count();
        return view('admin.dashboard', compact('chart'));
    }
}
