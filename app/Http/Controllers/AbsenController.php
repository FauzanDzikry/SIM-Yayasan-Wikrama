<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absens = Absen::with('user')->get();
        return view('pegawai.absen.index', ['absens' => $absens]);
    }
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $absen = Absen::create([
            'npp' => auth()->user()->npp,
            'name' => auth()->user()->name,
            'tanggal' => $tanggal,
            'jam_masuk' => $localtime,]);
            if ($absen){
                return redirect('/Dashboard/User/Absen/Pegawai')->with('success','Absen telah tersipan dengan tanggal masuk pukul : '.$localtime);
            }else{
                return redirect('/Dashboard/User/Absen/Pegawai')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
            }
    }
    public function admin()
    {
        $absens = Absen::all();
        return view('admin.absen.index', ['absens' => $absens])->with('i');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $absens = Absen::where('name', 'like', "%" . $keyword . "%")->paginate();
        return view('admin.absen.index', compact('absens'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function destroy($id)
    {
        $absens = Absen::findOrFail($id);
        $absens->delete();

        if ($absens) {
            return redirect()->route('absen_admin')
                ->with([
                    'destroy' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()->route('absen_admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    public function hapus()
    {
        $absens = Absen::truncate();

        if ($absens) {
            return redirect()->route('absen_admin')
                ->with([
                    'destroy' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()->route('absen_admin')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
