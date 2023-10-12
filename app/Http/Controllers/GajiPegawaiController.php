<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use PDF;

class GajiPegawaiController extends Controller
{
    public function index()
    {
        $gajis = Gaji::all();
      return view('pegawai.gaji.index', compact('gajis'))
      ->with('i');
    }
    public function simpan($id)
      {
            $gajis = Gaji::findOrFail($id);
            $pdf = PDF::loadview('admin.gaji.print',['gajis'=>$gajis])->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('laporan-pegawai.pdf');
      }
}
