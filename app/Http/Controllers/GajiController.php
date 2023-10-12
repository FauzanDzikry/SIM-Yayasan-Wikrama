<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
ini_set('max_execution_time', 300);

class GajiController extends Controller
{
    public function index()
    {
        $gajis = Gaji::all();
      return view('admin.gaji.index', compact('gajis'))
      ->with('i');
    }
    public function create()
    {
        $gajis = User::where('jabatan', '!=', 'admin')->get();
        return view('admin.gaji.create',compact('gajis'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'h_pendidikan' => 'required',
            'h_mengajar' => 'required',
            'jabatan_t' => 'required',
            'h_tambahan' => 'required',
            'tj_kelebihan' => 'required',
            'tj_wali' => 'required',
            'tj_koordinator' => 'required',
            'tj_kehadiran' => 'required',
            'tj_kerja' => 'required',
            'tj_tetap' => 'required',
            'tj_keluarga' => 'required',
            'bpjs_ketenagakerjaan' => 'required',
            'bpjs_kesehatan' => 'required',
            'pajak_bpmu' => 'required',
            'lain' => 'required',
            'p_bpjs_ketenagakerjaan_sekolah' => 'required',
            'p_bpjs_ketenagakerjaan_pegawai' => 'required',
            'p_bpjs_kesehatan_sekolah' => 'required',
            'p_bpjs_kesehatan_pegawai' => 'required',
            'p_pajak_bpmu' => 'required',
            'pph' => 'required',
            'kasbon' => 'required',
            'infak' => 'required',
            'dplk' => 'required',
            'ids_residence' => 'required',
            'p_lain' => 'required'
        ]);
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('m-Y');

        $validate['tanggal'] = $tanggal;
        $validate['name'] = $request->name;
        $validate['npp'] = $request->npp;
        $validate['jabatan'] = $request->jabatan;
        $validate['status'] = $request->status;

        $validate['t_pendapatan'] = $request->h_pendidikan + $request->h_mengajar + $request->h_tambahan + $request->tj_kelebihan + $request->tj_wali + $request->tj_koordinator + $request->tj_kehadiran + $request->tj_kerja + $request->tj_tetap + $request->tj_keluarga +$request->bpjs_ketenagakerjaan + $request->bpjs_kesehatan + $request->pajak_bpmu + $request->lain;

        $validate['t_potongan'] = $request->p_bpjs_ketenagakerjaan_sekolah + $request->p_bpjs_ketenagakerjaan_pegawai + $request->p_bpjs_kesehatan_sekolah + $request->p_bpjs_kesehatan_pegawai + $request->p_pajak_bpmu + $request->pph + $request->kasbon + $request->infak + $request->dplk + $request->ids_residence + $request->p_lain;
        $t_pendapatan = $request->h_pendidikan + $request->h_mengajar + $request->h_tambahan + $request->tj_kelebihan + $request->tj_wali + $request->tj_koordinator + $request->tj_kehadiran + $request->tj_kerja + $request->tj_tetap + $request->tj_keluarga +$request->bpjs_ketenagakerjaan + $request->bpjs_kesehatan + $request->pajak_bpmu + $request->lain;
        $t_potongan = $request->p_bpjs_ketenagakerjaan_sekolah + $request->p_bpjs_ketenagakerjaan_pegawai + $request->p_bpjs_kesehatan_sekolah + $request->p_bpjs_kesehatan_pegawai + $request->p_pajak_bpmu + $request->pph + $request->kasbon + $request->infak + $request->dplk + $request->ids_residence + $request->p_lain;
        $validate['t_take'] = $t_pendapatan - $t_potongan;

        Gaji::create($validate);
        return redirect('Dashboard/Admin/Slip-Gaji');
    }
    public function destroy($id)
    {
        $gajis = Gaji::findOrFail($id);
        $gajis->delete();

        if ($gajis) {
            return redirect()
                ->route('sg_admin')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sg_admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    public function name($id) {
        $name = User::findOrFail($id);
        return response()->json($name);
      }
      public function simpan($id)
      {
            $gajis = Gaji::findOrFail($id);
            $pdf = PDF::loadview('admin.gaji.print',['gajis'=>$gajis])->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('laporan-pegawai.pdf');
      }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $gajis = Gaji::where('npp', 'like', "%" . $keyword . "%")->paginate();
        return view('admin.gaji.index', compact('gajis'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function hapus()
    {
        $gajis = Gaji::truncate();

        if ($gajis) {
            return redirect()->route('sg_admin')
                ->with([
                    'destroy' => 'Seluruh Data Slip Gaji Telah Berhasil Di Hapus'
                ]);
        } else {
            return redirect()->route('sg_admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
