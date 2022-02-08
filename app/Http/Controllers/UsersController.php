<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.akun_pegawai.index');
    }
    public function akun_saya()
    {
        $data = User::find(Auth::user()->id);
        return view('admin.account.index', compact('data'));
    }
    public function store(Request $request)
    {
        try {
            if ($request->password != $request->ulangi_password) {
                return redirect()->back()->with(['error' => 'Gagal, password tidak sama']);
            } else {
                $data = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => 'Admin',
                    'status' => 1,
                    'password' => Hash::make($request->password),
                ]);
            }
            return redirect()->back()->with(['success' => $data->name . ' berhasil ditambahkan']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal tambahkan, ' . $message]);
        }
    }
    public function update_akun_saya(Request $request)
    {
        try {
            $data = User::find(Auth::user()->id);
            if ($request->password == null) {
                $data->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            } else {
                if (strlen($request->password) < 8) {
                    return redirect()->back()->with(['error' => 'Gagal memperbarui, password harus minimal berisi 8 huruf']);
                }
                $data->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }
            return redirect()->back()->with(['success' => $data->name . ' berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal memperbarui, ' . $message]);
        }
    }
    public function getDataAkunPegwai(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = DB::table('users as d')
            ->select('d.*')
            ->where('role', '!=', 'Root')
            ->orderBy('d.id', 'DESC')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $statusBadge = '<span class="badge text-white rounded-pill bg-success">Aktif</span>';
                    } else {
                        $statusBadge = '<span class="badge text-white rounded-pill bg-danger">Non Aktif</span>';
                    }
                    return $statusBadge;
                })
                ->addColumn('action', function ($row) {
                    if ($row->status == 1) {
                        $title = 'Non Aktifkan';
                        $color = 'danger';
                    } else {
                        $title = 'Aktifkan';
                        $color = 'success';
                    }
                    $actionBtn =
                        '<button type="button"
                            onclick="are_you_sure(`' . $title . ' ' . $row->name . '`,`' . route('change_status_pegawai', ['id' =>  $row->id]) . '`,`' . $title . '`)"
                            class="btn btn-inverse-' . $color . ' btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                        </button>
                        <button type="button"
                            data-toggle="modal"
                            onclick="data_modal(`' . $row->name . ',' . $row->email . '`,`' . route('update_pegawai', ['id' =>  $row->id]) . '`)"
                            data-target="#modalUpdate"
                            title="Perbarui data pegawai"
                            class="btn btn-inverse-primary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </button>
                        <button type="button" title="Hapus Akun Pegawai"
                            onclick="are_you_sure(`hapus ' . $row->name . '`,`' . route('delete_pegawai', ['id' =>  $row->id]) . '`,`Hapus`)" class="btn btn-inverse-secondary btn-icon btn-icon-only m-1">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"> <polyline points="3 6 5 6 21 6"></polyline> <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"> </path> </svg>
                        </button>';
                    return $actionBtn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
    public function delete($id)
    {
        try {
            $User = User::find($id);
            $name = $User->name;
            $User->delete($User);
            return redirect()->back()->with(['success' => $name . ' berhasil di hapus']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal menghapus, ' . $message]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $data = User::find($id);
            if ($request->password == null) {
                $data->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            } else {
                if (strlen($request->password) < 8) {
                    return redirect()->back()->with(['error' => 'Gagal memperbarui, password harus minimal berisi 8 huruf']);
                }
                $data->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }
            return redirect()->back()->with(['success' => $data->name . ' berhasil di perbarui']);
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Gagal memperbarui, ' . $message]);
        }
    }
    public function change_status($id)
    {
        try {
            $data = User::find($id);
            if ($data->status == 1) {
                $data->update(['status' => 0,]);
                return redirect()->back()->with(['success' => $data->name . ' deactive successfully']);
            } else {
                $data->update(['status' => 1,]);
                return redirect()->back()->with(['success' => $data->name . ' activated successfully']);
            }
        } catch (\Throwable $th) {
            $message = join(" ", array_filter(explode(" ", preg_replace("/[^a-zA-Z.@]/", " ", $th->getMessage()))));
            return redirect()->back()->with(['error' => 'Failed to update, ' . $message]);
        }
    }
}
