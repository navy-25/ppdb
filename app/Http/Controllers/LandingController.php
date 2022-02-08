<?php

namespace App\Http\Controllers;

use App\Models\AlurPendaftaran;
use App\Models\CalonPeserta;
use App\Models\CategoryBiaya;
use App\Models\CategoryPersyaratan;
use App\Models\Jadwal;
use App\Models\Siswa;
use Database\Seeders\CategoryPersyaratanSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function daftar()
    {
        return view('user.daftar');
    }
    public function syarat_pendaftaran()
    {
        $data['category'] = CategoryPersyaratan::orderBy('id', 'ASC')->get();
        return view('user.syarat_pendaftaran', compact('data'));
    }
    public function jadwal()
    {
        $data = Jadwal::first();
        return view('user.jadwal', compact('data'));
    }
    public function biaya()
    {
        $data['category'] = CategoryBiaya::orderBy('id', 'ASC')->get();
        return view('user.biaya', compact('data'));
    }
    public function alur_pendaftaran()
    {
        $data = AlurPendaftaran::first();
        return view('user.alur_pendaftaran', compact('data'));
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
                ->orWhere('cp.no_peserta', 'like', '%' .  $_GET['pencarian'] . '%')
                ->get();
        } else {
            $data = null;
        }
        return view('user.cek_status_daftar', compact('data'));
    }
    public function form_pendaftaran_siswa(Request $request)
    {
        try {
            $Siswa = Siswa::create([
                'ijazah' => $request->file_raport,
                'photo' => $request->file_foto,
                'nama_lengkap' => $request->name,
                'tempat_lahir' => $request->tanggal_lahir,
                'tanggal_lahir' => date('Y-m-d', strtotime($request->tempat_lahir)),
                'jenis_kelamin' => $request->jenis_kelamin,
                'nisn' => $request->nisn,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat' => $request->alamat_sekarang,
                'no_kk' => $request->no_kk,
                'nama_ayah' => $request->nama_ayah,
                'telepon_ayah' => $request->telepon_wali,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'nama_ibu' => $request->nama_ibu,
                'telepon_ibu' => $request->telepon_wali,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_perbulan' => $request->penghasilan_ayah + $request->penghasilan_ibu,
            ]);
            $max_id =  DB::table('calon_pesertas as d')
                ->select('d.*')
                ->latest('no_peserta')->first();
            if ($max_id == null) {
                $max_id = '000001';
            } else {
                $max_id = explode('-', $max_id->no_peserta);
                $max_id = (int)$max_id[1] + 1;
            }
            $number = sprintf("%05s", $max_id);
            $CalonPeserta = CalonPeserta::create([
                'jalur' => $request->jalur,
                'no_peserta' => 'MAN1-' . $number,
                'no_pendaftaran' => 'REG-' . $number,
                'jurusan' => $request->jurusan,
                'status' => 'Calon Pendaftar',
                'id_siswa' => $Siswa->id,
            ]);

            if ($request->photo != null) {
                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $request->validate([
                        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    ]);
                    $filename = $Siswa->id . '_' . $Siswa->nama_lengkap . '.' . $file->getClientOriginalExtension();
                    $request->file('photo')->move('assets/uploads/calon siswa/', $filename);
                    $Siswa->photo = $filename;
                    $Siswa->save();
                }
                if ($request->hasFile('file_raport')) {
                    $file = $request->file('file_raport');
                    $filename = $Siswa->id . '_' . $Siswa->nama_lengkap . '.' . $file->getClientOriginalExtension();
                    $request->file('v')->move('assets/uploads/ijazah/', $filename);
                    $Siswa->ijazah = $filename;
                    $Siswa->save();
                }
            }
            return redirect()->route('cek_status_pendaftaran')->with(['success' => 'Berhasil mengirim data']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->route('daftar')->with(['error' => 'Gagal mengirim data, ' . $message]);
        }
    }

    //new
    public function print_kartu_peserta($nama_lengkap, $id)
    {
        $data = DB::table('siswas as cp')
            ->select(
                's.*',
                'cp.*'
            )
            ->join('calon_pesertas as s', 's.id_siswa', 'cp.id')
            ->where('s.id_siswa', $id)
            ->first();
        return view('user.print_kartu_peserta', compact('data'));
    }
}
