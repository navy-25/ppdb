<?php

namespace App\Http\Controllers;

use App\Models\AlurPendaftaran;
use App\Models\Booklet;
use App\Models\Jadwal;
use App\Models\SoalTest;
use Illuminate\Http\Request;

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
}
