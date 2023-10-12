<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sk;

class SkPegawaiController extends Controller
{
    public function index()
    {
        $sks = Sk::all();
      return view('pegawai.sk.index', compact('sks'))
      ->with('i');
    }
}
