<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $posts = Absen::with('user')->get();
        return view('pegawai.index', ['posts' => $posts]);
    }
    public function user()
    {
        $tetap = User::where('status','tetap')->count();
        $magang = User::where('status','magang')->count();
        $total = User::where('level', '!=', 'admin')->count();
        $users = User::where('level', '!=', 'admin')->latest()->paginate(5);
        return view('admin.pegawai.index',compact('users','tetap','magang','total'))
            ->with('i');
    }
    public function create()
    {
        return view('admin.pegawai.create');
    }
    public function store(Request $request)
    {
    	$validate = $request->validate([
			'name' => 'required',
            'npp' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'password' => 'required'
    	]);

       	$password = bcrypt($request->password);
       	$validate['password'] = $password;
       	$validate['level'] = 'user';
       	$validate['jabatan'] = $request->jabatan;
       	$user = User::create($validate);

        if ($user) {
            return redirect()
                ->route('p_admin')
                ->with([
                    'success' => 'Data Pegawai Baru Telah Berhasil Di Simpan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada Kesalahan Dalam Penginputan,Silahkan Coba Lagi'
                ]);
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pegawai.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'npp' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'password' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'npp' => $request->npp,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            return redirect()
                ->route('p_admin')
                ->with([
                    'success' => 'Data Pegawai Terlah Berhasil Di Rubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Ada Kesalahan Dalam Penginputan,Silahkan Coba Lagi'
                ]);
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('p_admin')
                ->with([
                    'destroy' => 'Data Pegawai Telah Berhasil Di Hapus'
                ]);
        } else {
            return redirect()
                ->route('p_admin')
                ->with([
                    'error' => 'Ada Kesalahan Dalam Penginputan,Silahkan Coba Lagi'
                ]);
        }
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $tetap = User::where('status','tetap')->count();
        $magang = User::where('status','magang')->count();
        $total = User::where('level', '!=', 'admin')->count();
        $users = User::where('npp', 'like', "%" . $keyword . "%")->paginate();
        return view('admin.pegawai.index', compact('users','tetap','magang','total'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}