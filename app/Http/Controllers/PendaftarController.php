<?php

namespace App\Http\Controllers;

use App\Models\CalonPeserta;
use App\Models\Siswa;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PendaftarController extends Controller
{
    public function calon_regular()
    {
        return view('admin.pendaftar.calon_regular');
    }
    public function calon_undangan()
    {
        return view('admin.pendaftar.calon_undangan');
    }

    public function peserta_lolos()
    {
        return view('admin.pendaftar.peserta_lolos');
    }

    public function cetak_surat()
    {
        return view('admin.pendaftar.cetak_surat');
    }

    public function view_calon($id)
    {
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.id', $id)
            ->first();

        $tanggal_lahir = $data->tanggal_lahir;
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $count['umur'] = $today->diff($birthDate)->y;
        return view('admin.pendaftar.view_calon', compact('data', 'count'));
    }
    public function print_calon($id)
    {
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.id', $id)
            ->first();
        return view('admin.pendaftar.print_calon', compact('data'));
    }
    public function print_sp_wali($id)
    {
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.id', $id)
            ->first();
        return view('admin.pendaftar.print_sp_wali', compact('data'));
    }
    public function print_sp_calon_peserta_didik($id)
    {
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.id', $id)
            ->first();
        return view('admin.pendaftar.print_sp_calon_peserta_didik', compact('data'));
    }
    public function getDataCalonPendfatar(Request $request, $jalur)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.jalur', $jalur)
            ->where('status', 'Calon Pendaftar')
            ->orderBy('d.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    if ($row->photo == '' || $row->photo == null) {
                        $photo = '<img src="' . asset('assets/images/80x80.png') . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    } else {
                        $photo = '<img src="' . asset('assets/uploads/calon siswa/' . $row->photo) . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    }
                    return $photo;
                })
                ->addColumn('date', function ($row) {
                    $date = date('d M Y - H:i', strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="' . route('view_calon', ['id' =>  $row->id]) . '"
                            title="Lihat Data Calon"
                            class="btn btn-inverse-info btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" style="margin-top:7px !important" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </a>
                        <button type="button" title="Hapus Data Calon"
                            onclick="are_you_sure(`hapus ' . $row->nama_lengkap . '`,`' . route('delete_calon_regular', ['id' =>  $row->id]) . '`,`Hapus`)" class="btn btn-inverse-secondary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"> </path> </svg>
                        </button>';
                    return $actionBtn;
                })
                ->rawColumns(['date', 'photo', 'action'])
                ->make(true);
        }
    }
    public function getDataPesertaLolos(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('status', 'Lolos')
            ->orderBy('d.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    if ($row->photo == '' || $row->photo == null) {
                        $photo = '<img src="' . asset('assets/images/80x80.png') . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    } else {
                        $photo = '<img src="' . asset('assets/uploads/calon siswa/' . $row->photo) . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    }
                    return $photo;
                })
                ->addColumn('date', function ($row) {
                    $date = date('d M Y - H:i', strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="' . route('view_calon', ['id' =>  $row->id]) . '"
                            title="Lihat Data Calon"
                            class="btn btn-inverse-info btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" style="margin-top:7px !important" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </a>
                        <button type="button" title="Hapus Data Calon"
                            onclick="are_you_sure(`hapus ' . $row->nama_lengkap . '`,`' . route('delete_calon_regular', ['id' =>  $row->id]) . '`,`Hapus`)" class="btn btn-inverse-secondary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"> </path> </svg>
                        </button>';
                    return $actionBtn;
                })
                ->rawColumns(['date', 'photo', 'action'])
                ->make(true);
        }
    }
    public function getDataPesertaLolosCetakSurat(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('status', 'Lolos')
            ->orderBy('d.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    if ($row->photo == '' || $row->photo == null) {
                        $photo = '<img src="' . asset('assets/images/80x80.png') . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    } else {
                        $photo = '<img src="' . asset('assets/uploads/calon siswa/' . $row->photo) . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    }
                    return $photo;
                })
                ->addColumn('jalur', function ($row) {
                    $jalur = $row->jalur . '(' . $row->jurusan . ')';
                    return $jalur;
                })
                ->addColumn('surat_pernyataan', function ($row) {
                    $surat_pernyataan =
                        '<a href = "' . route('print_sp_wali', ['id' =>  $row->id]) . '"
                            title="Print Surat Pernyataan Orang Tua / Wali"
                            target="_blank"
                            class="btn btn-inverse-info btn-icon-text m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="btn-icon-prepend css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                            Orang Tua/Wali
                        </a>
                        <a href = "' . route('print_sp_calon_peserta_didik', ['id' =>  $row->id]) . '"
                            title="Print Surat Pernyataan Calon Peserta Didik"
                            target="_blank"
                            class="btn btn-inverse-warning btn-icon-text m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="btn-icon-prepend css-i6dzq1"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                            Calon Peserta Didik
                        </a>';
                    return $surat_pernyataan;
                })
                ->rawColumns(['jalur', 'photo',  'surat_pernyataan'])
                ->make(true);
        }
    }
    public function delete_calon_regular($id)
    {
        try {
            $CalonPeserta = CalonPeserta::find($id);
            $Siswa = Siswa::find($CalonPeserta->id_siswa);
            if ($Siswa != null) {
                $name = $Siswa->name;
                $Siswa->delete($Siswa);
            }
            $CalonPeserta->delete($CalonPeserta);
            return redirect()->back()->with(['success' => $name . ' berhasil di hapus']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
}