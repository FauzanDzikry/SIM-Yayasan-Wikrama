<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <title>SIM Yayasan - Print</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('template/admin/css/bootstrap.min.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	    <!----css3---->
        <link rel="stylesheet" href="{{url('template/admin/css/custom.css')}}">
        <link rel="stylesheet" href="{{url('template/admin/css/style.css')}}">
  </head>
  <body class="bg-white">
        <!-- Page Content  -->
                <div style="padding:20px 10%;">
                    <div>
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('foto/1.jpg'))) }}" width="100%">
                    </div>
                    <div style="margin:4%;">
                        <table border="1" style="background-color:#E0E0E0;">
                            <tr>
                                <td>
                                    <p style="padding:10px;">Data penggajian bersifat pribadi dan rahasia. Masing-masing pegawai agar menjaga kerahasiaan data penggajian. Data penggajian hanya dipergunakan untuk kepentingan internal dan dilarang keras menyampaikan kepada pihak eksternal. Pembocoran rahasia penggajian (termasuk kepada sesama pegawai) dikategorikan sebagai pelanggaran rahasia jabatan  yang dapat dikenakan sanksi administratif sesuai dengan ketentuan yang berlaku.</p>
                                </td>
                            </tr>
                        </table>
                        <h2 style="margin-top:10px;color:#4169E1;">Detail Laporan Keuangan</h2>
                        <table>
                            <tr>
                                <td>NPP : {{$gajis->npp}}</td>
                            </tr>
                            <tr>
                                <td>Name : {{$gajis->name}}</td>
                            </tr>
                            <tr>
                                <td>Status Kepegawaian : {{$gajis->status}}</td>
                            </tr>
                            <tr>
                                <td>Bulan : {{$gajis->tanggal}}</td>
                            </tr>
                        </table>
                        <br>
                        <table border="0" style="background-color:#E0E0E0;width:100%;">
                            <tr>
                                <td><p style="margin:10px;"> Summary item</p></td>
                                <td><p style="margin:10px;float:right;margin-right:30%;">Rupiah (Rp)</p></td>
                            </tr>
                        </table>
                        <br>
                        <h5><strong>Detail pendapatan (+)</strong></h5>
                        <table class="table_detail" width="100%">
                            <tr>
                                <th><p style="margin:10px;width:100%;">Honor</p></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Honor Tenaga Kependidikan</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->h_pendidikan}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Honor Mengajar</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->h_mengajar}}</p></td>
                            </tr>
                            <tr>
                                <th><p style="margin:10px;width:100%;">Benefit Jabatan</p></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th><p style="margin:10px;">Honor Tugas Tambahan/Jabatan</p></th>
                                <th><p style="margin:10px;text-align:center;"> : </p></th>
                                <th><p style="margin:10px;"></p></th>
                            </tr>
                            <tr>
                                <th><p style="margin:10px;">{{$gajis->jabatan_t}}</p></th>
                                <th><p style="margin:10px;text-align:center;">:</p></th>
                                <td><p style="margin:10px;">{{$gajis->h_tambahan}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Kelebihan Jam Mengajar</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></t>
                                <td><p style="margin:10px;">{{$gajis->tj_kelebihan}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Wali Kelas</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->tj_wali}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Koordinator Mata Pelajaran</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->tj_koordinator}}</p></td>
                            </tr>
                            <tr>
                                <th><p style="margin:10px;width:100%;">Benefit Kinerja</p></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Kehadiran bulan {{$gajis->tanggal}} </p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->tj_kehadiran}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Masa Kerja</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->tj_kerja}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Masa Kerja & Tunjangan Pegawai Tetap</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->tj_tetap}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Keluarga</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->tj_keluarga}}</p></td>
                            </tr>
                            <tr>
                                <th><p style="margin:10px;width:100%;">Benefit Kepegawaian</p></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">BPJS Ketenagakerjaan Kewajiban Sekolah</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->bpjs_ketenagakerjaan}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">BPJS Kesehatan Kewajiban Sekolah</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->bpjs_kesehatan}}</p></td>
                            </tr>
                            <tr>
                                <th><p style="margin:10px;width:100%;">Lain-lain</p></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Tunjangan Pajak BPMU/BOS</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->pajak_bpmu}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Lainnya</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->lain}}</p></td>
                            </tr>
                            <tr style="background-color:#E0E0E0;">
                                <td><strong style="margin:10px;float:right;">Subtotal Detail pendapatan (+)</strong></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->t_pendapatan}}</p></td>
                            </tr>
                        </table>
                        <br>
                        <h5><strong>Detail potongan (-)</strong></h5>
                        <table class="table_detail" width="100%">
                            <tr>
                                <td><p style="margin:10px;">BPJS Ketenagakerjaan Kewajiban Sekolah</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->p_bpjs_ketenagakerjaan_sekolah}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">BPJS Ketenagakerjaan Kewajiban Pegawai</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->p_bpjs_ketenagakerjaan_pegawai}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">BPJS Kesehatan Kewajiban Sekolah</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->p_bpjs_kesehatan_sekolah}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">BPJS Kesehatan Kewajiban Pegawai</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->p_bpjs_kesehatan_pegawai	}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Pajak BPMU/BOS </p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->p_pajak_bpmu}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">PPH 21 (karena pendapatan > PTKP)</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->pph}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Potongan Kasbon</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->kasbon}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Infak & Sodaqoh</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->infak}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">DPLK / Simponi</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->dplk}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">IDS Residence</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->ids_residence}}</p></td>
                            </tr>
                            <tr>
                                <td><p style="margin:10px;">Lain-lain</p></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->p_lain}}</p></td>
                            </tr>
                            <tr style="background-color:#E0E0E0;">
                                <td><strong style="margin:10px;float:right;">Subtotal Detail potongan (-)</strong></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->t_potongan}}</p></td>
                            </tr>
                        </table>
                        <br>
                        <table class="table_detail" width="100%">
                            <tr style="background-color:#E0E0E0;">
                                <td><strong style="margin:10px;float:right;">Total Pendapatan (+)</strong></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->t_pendapatan}}</p></td>
                            </tr>
                            <tr style="background-color:#E0E0E0;">
                                <td><strong style="margin:10px;float:right;">Subtotal Detail potongan (-)</strong></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->t_potongan}}</p></td>
                            </tr>
                            <tr style="background-color:#D3D3D3;">
                                <td><strong style="margin:10px;float:right;">Total Take Home Pay</strong></td>
                                <td><p style="margin:10px;text-align:center;">:</p></td>
                                <td><p style="margin:10px;">{{$gajis->t_take}}</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
  </body>
  </html>