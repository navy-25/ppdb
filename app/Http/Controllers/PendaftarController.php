<?php

namespace App\Http\Controllers;

use App\Models\CalonPeserta;
use App\Models\NilaiTest;
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
    public function peserta_tidak_lolos()
    {
        return view('admin.pendaftar.peserta_tidak_lolos');
    }

    public function cetak_surat()
    {
        return view('admin.pendaftar.cetak_surat');
    }
    public function cek_berkas_undangan()
    {
        return view('admin.pendaftar.cek_berkas_undangan');
    }
    public function peserta_lolos_print()
    {
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('status', 'Lulus')
            ->get();
        return view('admin.pendaftar.peserta_lolos_print', compact('data'));
    }
    public function input_hasil_tes()
    {
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.jalur', 'Regular')
            ->where('status', 'Calon Pendaftar')
            ->orderBy('d.id', 'DESC')
            ->get();
        return view('admin.pendaftar.input_hasil_tes', compact('data'));
    }
    public function save_nilai(Request $request)
    {
        try {
            NilaiTest::create([
                'id_siswa' => $request->id_siswa,
                'nilai' => $request->nilai_tes,
            ]);
            $calon_psserta = CalonPeserta::where('id_siswa', $request->id_siswa)->first();
            $calon_psserta->update(['status' => $request->status]);
            $siswa = Siswa::find($request->id_siswa);
            return redirect()->back()->with(['success' => 'Nilai ' . $siswa->nama_lengkap . ' berhasil diinput']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal memberikan nilai peserta, ' . $message]);
        }
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
        // if ($birthDate > $today) {
        //     exit("0 tahun 0 bulan 0 hari");
        // }
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
    public function to_update($id)
    {
        $data = DB::table('siswas as d')
            ->select('cp.*', 'd.*')
            ->join('calon_pesertas as cp', 'cp.id_siswa', 'd.id')
            ->where('d.id', $id)
            ->first();
        return view('admin.pendaftar.update_calon', compact('data'));
    }
    public function update_calon(Request $request, $id)
    {
        try {
            $data = Siswa::find($id);
            $data->update([
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' =>  date('Y-m-d', strtotime($request->tanggal_lahir)),
                'jenis_kelamin' => $request->jenis_kelamin,
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'hobi' => $request->hobi,
                'cita_cita' => $request->cita_cita,
                'jumlah_saudara' => $request->jumlah_saudara,
                'anak_ke' => $request->anak_ke,
                'asal_sekolah' => $request->asal_sekolah,
                'npsn_asal_sekolah' => $request->npsn_asal_sekolah,
                'jenis_sekolah' => $request->jenis_sekolah,
                'status_sekolah' => $request->status_sekolah,
                'mengikuti_paud' => $request->mengikuti_paud,
                'mengikuti_tk' => $request->mengikuti_tk,
                'alamat' => $request->alamat,
                'desa_kelurahan' => $request->desa_kelurahan,
                'kodepos' => $request->kodepos,
                'kecamatan' => $request->kecamatan,
                'kab_kota' => $request->kab_kota,
                'provinsi' => $request->provinsi,
                'jarak_tempat_tinggal' => $request->jarak_tempat_tinggal,
                'transportasi' => $request->transportasi,
                'status_penerimaan_pip_bsm' => $request->status_penerimaan_pip_bsm,
                'alasan_menerima_pip_bsm' => $request->alasan_menerima_pip_bsm,
                'periode_menerima_pip_bsm' => $request->periode_menerima_pip_bsm,
                'bidang_prestasi' => $request->bidang_prestasi,
                'tingkat_prestasi' => $request->tingkat_prestasi,
                'peringkat' => $request->peringkat,
                'tahun' => $request->tahun,
                'status_beasiswa' => $request->status_beasiswa,
                'sumber_beasiswa' => $request->sumber_beasiswa,
                'jenis_beasiswa' => $request->jenis_beasiswa,
                'jangka_waktu' => $request->jangka_waktu,
                'besaran_uang' => $request->besaran_uang,
                'no_kk' => $request->no_kk,
                'nama_ayah' => $request->nama_ayah,
                'nik_ayah' => $request->nik_ayah,
                'pendidikan_terakhir_ayah' => $request->pendidikan_terakhir_ayah,
                'telepon_ayah' => $request->telepon_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'nama_ibu' => $request->nama_ibu,
                'nik_ibu' => $request->nik_ibu,
                'pendidikan_terakhir_ibu' => $request->pendidikan_terakhir_ibu,
                'telepon_ibu' => $request->telepon_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_perbulan' => $request->penghasilan_perbulan,
                'nomor_kss_kps' => $request->nomor_kss_kps,
                'nomor_pkh' => $request->nomor_pkh,
                'nomor_kip' => $request->nomor_kip,
            ]);
            if ($request->photo != null) {
                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $filename = 'foto_' . $data->id . '_' . $data->nama_lengkap . '.' . $file->getClientOriginalExtension();
                    $request->file('photo')->move('assets/uploads/calon siswa/', $filename);
                    $data->photo = $filename;
                    $data->save();
                }
            }
            if ($request->ijazah != null) {
                if ($request->hasFile('ijazah')) {
                    $file = $request->file('ijazah');
                    $filename = 'ijazah_' . $data->id . '_' . $data->nama_lengkap . '.' . $file->getClientOriginalExtension();
                    $request->file('ijazah')->move('assets/uploads/calon siswa/', $filename);
                    $data->ijazah = $filename;
                    $data->save();
                }
            }
            if ($request->piagam != null) {
                if ($request->hasFile('piagam')) {
                    $file = $request->file('piagam');
                    $filename = 'piagam_' . $data->id . '_' . $data->nama_lengkap . '.' . $file->getClientOriginalExtension();
                    $request->file('piagam')->move('assets/uploads/calon siswa/', $filename);
                    $data->piagam = $filename;
                    $data->save();
                }
            }
            return redirect()->back()->with(['success' => $data->name . ' berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal memperbarui, ' . $message]);
        }
    }
    public function getDataPesertaUndangan(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('d.jalur', 'Undangan')
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
                        $photo = '<img src="' . asset('assets/uploads/calon siswa/' . $row->photo) . '" alt="' . $row->photo . '" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    }
                    return $photo;
                })
                ->addColumn('date', function ($row) {
                    $date = date('d M Y - H:i', strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('ijazah', function ($row) {
                    if ($row->ijazah == "") {
                        $ijazah = "Tidak ada";
                    } else {
                        $ijazah = '
                        <a href="' . asset('assets/uploads/calon siswa/' . $row->ijazah)  . '" target="_blank"  class="btn btn-secondary text-white btn-icon-text py-1">
                            Cek Ijazah
                        </a>';
                    }
                    return $ijazah;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<button type="button" title="Luluskan Calon Peserta"
                            onclick="are_you_sure(`menerima ' . $row->nama_lengkap . '`,`' . route('luluskan_peserta_undangan', ['id' =>  $row->id]) . '`,`Luluskan`)"
                            class="btn btn-inverse-info btn-icon btn-icon-only m-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </button>
                        <button type="button" title="Tolak Calon Peserta"
                            onclick="are_you_sure(`menolak ' . $row->nama_lengkap . '`,`' . route('tolak_peserta_undangan', ['id' =>  $row->id]) . '`,`Tolak`)" class="btn btn-inverse-secondary btn-icon btn-icon-only m-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" tyle="margin-top:7px !important" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>';
                    return $actionBtn;
                })
                ->rawColumns(['date', 'ijazah', 'photo', 'action'])
                ->make(true);
        }
    }
    public function getDataPesertaRegular(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*', 'nt.nilai')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->join('nilai_tests as nt', 'nt.id_siswa', 'd.id_siswa')
            ->where('d.jalur', 'Regular')
            ->orderBy('d.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    if ($row->photo == '' || $row->photo == null) {
                        $photo = '<img src="' . asset('assets/images/80x80.png') . '" alt="placeholder" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    } else {
                        $photo = '<img src="' . asset('assets/uploads/calon siswa/' . $row->photo) . '" alt="' . $row->photo . '" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
                    }
                    return $photo;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="' . route('view_calon', ['id' =>  $row->id]) . '"
                            title="Lihat Data Peserta Tes"
                            class="btn btn-inverse-info btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" style="margin-top:7px !important" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </a>';
                    return $actionBtn;
                })
                ->rawColumns(['photo', 'action'])
                ->make(true);
        }
    }
    public function luluskan_peserta_undangan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $data = CalonPeserta::find($id);
            $siswa = Siswa::find($data->id_siswa);
            $data->update(['status' => 'Lulus']);
            return redirect()->back()->with(['success' => $siswa->nama_lengkap . ' dinyatakan lulus seleksi']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal meluluskan peserta, ' . $message]);
        }
    }
    public function luluskan_peserta_regular($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $data = CalonPeserta::find($id);
            $siswa = Siswa::find($id);
            $data->update(['status' => 'Lulus']);
            return redirect()->back()->with(['success' => $siswa->nama_lengkap . ' dinyatakan lulus seleksi']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal meluluskan peserta, ' . $message]);
        }
    }
    public function tolak_peserta_undangan($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $data = CalonPeserta::find($id);
            $siswa = Siswa::find($data->id_siswa);
            $data->update(['status' => 'Tidak Lulus']);
            return redirect()->back()->with(['success' => $siswa->nama_lengkap . ' dinyatakan tidak lulus seleksi']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menolak peserta, ' . $message]);
        }
    }
    public function tolak_peserta_regular($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $data = CalonPeserta::find($id);
            $siswa = Siswa::find($data->id_siswa);
            $data->update(['status' => 'Tidak Lulus']);
            return redirect()->back()->with(['success' => $siswa->nama_lengkap . ' dinyatakan tidak lulus seleksi']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menolak peserta, ' . $message]);
        }
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
                        $photo = '<img src="' . asset('assets/uploads/calon siswa/' . $row->photo) . '" alt="' . $row->photo . '" style="object-fit: cover !important;width:60px !important;height:60px !important;">';
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
            ->where('status', 'Lulus')
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
                    $date = date('d M Y - H:i', strtotime($row->updated_at));
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
    public function getDataPesertaTidakLolos(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('calon_pesertas as d')
            ->select('s.*', 'd.*')
            ->join('siswas as s', 's.id', 'd.id_siswa')
            ->where('status', 'Tidak Lulus')
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
                    $date = date('d M Y - H:i', strtotime($row->updated_at));
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
            ->where('status', 'Lulus')
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
