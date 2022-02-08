<?php

namespace App\Http\Controllers;

use App\Models\AlurPendaftaran;
use App\Models\Biaya;
use App\Models\Booklet;
use App\Models\CategoryBiaya;
use App\Models\CategoryPersyaratan;
use App\Models\Jadwal;
use App\Models\Persyaratan;
use App\Models\SoalTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MasterController extends Controller
{
    public function jadwal_pendaftaran()
    {
        $data = Jadwal::first();
        return view('admin.master.jadwal', compact('data'));
    }
    public function update_jadwal_pendaftaran(Request $request)
    {
        if ($request->file == null) {
            return redirect()->back()->with(['error' => 'Tidak ada foto yang di upload']);
        }
        try {
            $data = Jadwal::first();
            try {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $request->validate([
                        'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    ]);
                    $filename = 'jadwal_pendaftaran.' . $file->getClientOriginalExtension();
                    $request->file('file')->move('assets/uploads/landing/', $filename);
                    $data->file = $filename;
                    $data->save();
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'Gagal, ada yang salah dengan foto yang diupload']);
            }
            return redirect()->back()->with(['success' => 'Jadwal pendaftaran berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function alur_pendaftaran()
    {
        $data = AlurPendaftaran::first();
        return view('admin.master.alur_pendaftaran', compact('data'));
    }
    public function update_alur_pendaftaran(Request $request)
    {
        if ($request->file == null) {
            return redirect()->back()->with(['error' => 'Tidak ada foto yang di upload']);
        }
        try {
            $data = AlurPendaftaran::first();
            try {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $request->validate([
                        'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    ]);
                    $filename = 'alur_pendaftaran.' . $file->getClientOriginalExtension();
                    $request->file('file')->move('assets/uploads/landing/', $filename);
                    $data->file = $filename;
                    $data->save();
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'Gagal, ada yang salah dengan foto yang diupload']);
            }
            return redirect()->back()->with(['success' => 'Alur pendaftaran berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function booklet_pendaftaran()
    {
        $data = Booklet::first();
        return view('admin.master.booklet', compact('data'));
    }
    public function update_booklet(Request $request)
    {
        if ($request->file == null) {
            return redirect()->back()->with(['error' => 'Tidak ada file yang di upload']);
        }
        try {
            $data = Booklet::first();
            try {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = 'booklet.' . $file->getClientOriginalExtension();
                    $request->file('file')->move('assets/uploads/landing/', $filename);
                    $data->file = $filename;
                    $data->save();
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'Gagal, ada yang salah dengan file yang diupload']);
            }
            return redirect()->back()->with(['success' => 'Booklet berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function soal_test()
    {
        $data = SoalTest::first();
        return view('admin.master.soal_test', compact('data'));
    }
    public function update_soal_test(Request $request)
    {
        if ($request->file == null) {
            return redirect()->back()->with(['error' => 'Tidak ada file yang di upload']);
        }
        try {
            $data = SoalTest::first();
            try {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = 'soal_test_regular.' . $file->getClientOriginalExtension();
                    $request->file('file')->move('assets/uploads/landing/', $filename);
                    $data->file = $filename;
                    $data->save();
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'Gagal, ada yang salah dengan file yang diupload']);
            }
            return redirect()->back()->with(['success' => 'Soal Test Regular berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function persyaratan_pendaftaran_umum()
    {
        $data = Persyaratan::orderBy('number', 'ASC')->where('id_category', 1)->get();
        return view('admin.master.persyaratan_umum', compact('data'));
    }
    public function persyaratan_pendaftaran_undangan()
    {
        $data = Persyaratan::orderBy('number', 'ASC')->where('id_category', 2)->get();
        return view('admin.master.persyaratan_undangan', compact('data'));
    }
    public function persyaratan_pendaftaran_regular()
    {
        $data = Persyaratan::orderBy('number', 'ASC')->where('id_category', 3)->get();
        return view('admin.master.persyaratan_regular', compact('data'));
    }
    public function persyaratan_pendaftaran_tempat()
    {
        $data = Persyaratan::orderBy('number', 'ASC')->where('id_category', 4)->get();
        return view('admin.master.persyaratan_tempat', compact('data'));
    }
    public function persyaratan_pendaftaran_daftar_ulang()
    {
        $data = Persyaratan::orderBy('number', 'ASC')->where('id_category', 5)->get();
        return view('admin.master.persyaratan_daftar_ulang', compact('data'));
    }
    public function persyaratan_pendaftaran_lain_lain()
    {
        $data = Persyaratan::orderBy('number', 'ASC')->where('id_category', 6)->get();
        return view('admin.master.persyaratan_lain_lain', compact('data'));
    }
    public function delete_persyaratan_pendaftaran($id)
    {
        try {
            $Persyaratan = Persyaratan::find($id);
            $name = $Persyaratan->name;
            $Persyaratan->delete($Persyaratan);
            return redirect()->back()->with(['success' => $name . ' berhasil di hapus']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function store_persyaratan_pendaftaran(Request $request, $category)
    {
        try {
            $max_id =  DB::table('persyaratans as d')
                ->select('d.*')
                ->where('id_category', $category)
                ->latest('number')->first();
            if ($max_id == null) {
                $number = 1;
            } else {
                $number = (int)$max_id->number + 1;
            }
            if ($request->sub_persyaratan == null) {
                $sub_persyaratan = '';
            } else {
                $sub_persyaratan = $request->sub_persyaratan;
            }
            $Persyaratan = Persyaratan::create([
                'name' => $request->name,
                'id_category' => $category,
                'number' => $number,
                'sub_persyaratan' => $sub_persyaratan,
            ]);
            return redirect()->back()->with(['success' => $Persyaratan->name . ' berhasil di tambahkan']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal di tambahkan, ' . $message]);
        }
    }
    public function update_persyaratan_pendaftaran(Request $request, $id)
    {
        try {
            $Persyaratan = Persyaratan::find($id);
            $name = $Persyaratan->name;
            $Persyaratan->update([
                'name' => $request->name,
                'sub_persyaratan' => $request->sub_persyaratan,
            ]);
            return redirect()->back()->with(['success' => $name . ' berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal memperbarui, ' . $message]);
        }
    }
    public function getDataPersyaratan(Request $request, $category)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('persyaratans as d')
            ->select('d.*', 'cp.name as category_name')
            ->join('category_persyaratans as cp', 'cp.id', 'd.id_category')
            ->where('cp.id', $category)
            ->orderBy('cp.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('sub_persyaratan', function ($row) {
                    if ($row->sub_persyaratan == "") {
                        return "Tidak ada";
                    } else {
                        $data = Persyaratan::find($row->sub_persyaratan);
                        $category = CategoryPersyaratan::find($data->id_category);
                        return 'Nomor urut : ' . $data->number . '<br><br>Kategori :<br>' . $category->name . '<br><br>' . 'Isi Persyartan :<br>' . $data->name;
                    }
                })
                ->addColumn('action', function ($row) {
                    $category = CategoryPersyaratan::find($row->id_category);
                    $data = $row->id . ',' . $row->name . ',' . $row->id_category . ',' . $row->sub_persyaratan . ',' . $row->number;
                    $actionBtn =
                        '<button type="button"
                            data-toggle="modal"
                            onclick="data_modal(`' . $data . '`,`' . route('update_persyaratan_pendaftaran', ['id' =>  $row->id]) . '`)"
                            data-target="#modalUpdate"
                            title="Perbarui data biaya persyartan"
                            class="btn btn-inverse-primary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </button>
                        <button type="button" title="Hapus Persyaratan"
                            onclick="are_you_sure(`hapus persyaratan no ' . $row->number . ' kategori ' . $category->name . '`,`' . route('delete_persyaratan_pendaftaran', ['id' =>  $row->id]) . '`,`Hapus`)" class="btn btn-inverse-secondary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"> </path> </svg>
                        </button>';
                    return $actionBtn;
                })
                ->rawColumns(['sub_persyaratan', 'action'])
                ->make(true);
        }
    }
    public function biaya_infaq()
    {
        return view('admin.master.biaya_infaq');
    }
    public function biaya_siswa()
    {
        return view('admin.master.biaya_siswa');
    }
    public function delete_biaya_pendaftaran($id)
    {
        try {
            $Biaya = Biaya::find($id);
            $name = $Biaya->name;
            $Biaya->delete($Biaya);
            return redirect()->back()->with(['success' => $name . ' berhasil di hapus']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function update_biaya_pendaftaran(Request $request, $id)
    {
        try {
            $Biaya = Biaya::find($id);
            $name = $Biaya->name;
            $Biaya->update([
                'name' => $request->name,
                'total' => $request->total,
            ]);
            return redirect()->back()->with(['success' => $name . ' berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal memperbarui, ' . $message]);
        }
    }
    public function store_biaya_pendaftaran(Request $request, $category)
    {
        try {
            $category = CategoryBiaya::where('name', $category)->first();
            $Biaya = Biaya::create([
                'name' => $request->name,
                'id_category' => $category->id,
                'total' => $request->total,
            ]);
            return redirect()->back()->with(['success' => $Biaya->name . ' berhasil di tambahkan']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal di tambahkan, ' . $message]);
        }
    }
    public function getDataBiaya(Request $request, $category)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('biayas as d')
            ->select('d.*', 'cp.name as category_name')
            ->join('category_biayas as cp', 'cp.id', 'd.id_category')
            ->where('cp.name', $category)
            ->orderBy('d.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('total', function ($row) {
                    return "Rp. " . number_format($row->total, 0, ".", ".");
                })
                ->addColumn('action', function ($row) {
                    $data = $row->id . ',' . $row->name . ',' . $row->id_category . ',' . $row->total;
                    if ($row->category_name == 'Putri') {
                        $color = 'warning';
                    } else {
                        $color = 'primary';
                    }
                    $actionBtn =
                        '<button type="button"
                            data-toggle="modal"
                            onclick="data_modal(`' . $data . '`,`' . route('update_biaya_pendaftaran', ['id' =>  $row->id]) . '`)"
                            data-target="#modalUpdate"
                            title="Perbarui data biaya persyartan"
                            class="btn btn-inverse-' . $color . ' btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </button>
                        <button type="button" title="Hapus Biaya Pendaftaran"
                            onclick="are_you_sure(`hapus biaya ' . $row->name . '`,`' . route('delete_biaya_pendaftaran', ['id' =>  $row->id]) . '`,`Hapus`)" class="btn btn-inverse-secondary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"> </path> </svg>
                        </button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
