<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\Sk;
use App\Models\User;

class SkController extends Controller
{
    public function index()
    {
        $sks = Sk::all();
      return view('admin.sk.index', compact('sks'))
      ->with('i');
    }
    public function create()
    {
        $sks = User::where('npp', '!=', 'admin')->get();
        return view('admin.sk.create',compact('sks'));
    }
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y/m/d');

        $this->validate($request,[
            'file' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            'npp' => 'required',
            'name' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
        ]);
        $file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = 'sk';
	    $file->move($tujuan_upload,$nama_file);

        $sks = Sk::create([
			'file' => $nama_file,
			'npp' => $request->npp,
            'name' => $request->name,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'tanggal_sk'=> $tanggal,
		]);
        if ($sks) {
            return redirect()
                ->route('sk_admin')
                ->with([
                    'success' => 'Data Telah Di Simpan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Di Simpan'
                ]);
        }
    }
    public function destroy($id)
    {
        $sks = Sk::findOrFail($id);
        $sks->delete();

        if ($sks) {
            return redirect()
                ->route('sk_admin')
                ->with([
                    'destroy' => 'Data Telah Berhasil Di Hapus'
                ]);
        } else {
            return redirect()
                ->route('sk_admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
        public function npp($id) {
            $sks = User::findOrFail($id);
            return response()->json($sks);
        }
        public function search(Request $request)
    {
        $keyword = $request->search;
        $sks = Sk::where('npp', 'like', "%" . $keyword . "%")->paginate();
        return view('admin.sk.index', compact('sks'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function hapus()
    {
        $sks = Sk::truncate();

        if ($sks) {
            return redirect()->route('sk_admin')
                ->with([
                    'destroy' => 'Seluruh Data Surat Kerja Telah Berhasil Di Hapus'
                ]);
        } else {
            return redirect()->route('sk_admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
