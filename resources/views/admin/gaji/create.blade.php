@extends('template.master')

    @section('title', 'Dashboard')
            @section('sidebar')
            <div class="sidebar-header">
                <h3><img src="{{url('template/admin/img/logoWk.png')}}" class="img-fluid"/><span>SIM YAYASAN</span></h3>
            </div>
            <ul class="list-unstyled components">
			    <li  class="">
                    <a style="text-decoration: none;" href="{{route('admin')}}" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>			
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">person</i><span>Pegawai</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li>
                            <a style="text-decoration: none;" href="{{ route('p_admin') }}">Data & Register Pegawai</a>
                        </li>
                        <li>
                            <a style="text-decoration: none;" href="{{ route('p_create') }}">Create Pegawai</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">email</i><span>Surat Keputusan</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li class="">
                            <a style="text-decoration: none;" href="{{ route('sk_admin') }}">Data Surat Keputusan</a>
                        </li>
                        <li>
                            <a style="text-decoration: none;" href="{{ route('sk_create') }}">Create Surat Keputusan</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">folder</i><span>Slip Gaji</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li class="">
                            <a style="text-decoration: none;" href="{{ route('sg_admin') }}">Data Slip Gaji</a>
                        </li>
                        <li class="active">
                            <a style="text-decoration: none;" href="{{ route('sg_create') }}">Create Slip Gaji</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a style="text-decoration: none;" href="{{route('absen_admin')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>
            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')
                <div class="d-flex justify-content-between">
                    <div class="title">
                        <h3><img src="{{url('template/admin/img/Frame 2.png')}}" class="img-fluid"/>Form Slip Gaji</h3>
                    </div>
                </div>

                  <!-- Table -->
                <form action="{{ route('sg_store') }}" method="POST">
                    @csrf
                    <div class="wrapperTable table-responsive">
                        <table id="pegawaiTable" class="tables" style="width:100%">
                            <thead>
                                    <tr>
                                        <th class="fw-bold"><span style="color: #2196F3;">Detail Laporan Keuangan</span>
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                            </thead>
                            <tbody>
                                <td class="fw-bold">Pegawai</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label  class="form-label">Pilih Pegawai</label>
                                            <select class="form-select form-select w-100  mb-3" id="id" onchange="updateName();">
                                                <option selected>Pilih NPP Pegawai</option>
                                                @foreach($gajis as $us)
                                                <option value="{{ $us->id }}">{{ $us->npp }}</option>
                                                @endforeach
                                          </select> 
                                          <td></td>  
                                          <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label class="form-label">name</label>
                                                <input name="name" class="form-control" type="text" id="name" readonly>
                                            <td>
                                                <label class="form-label">Jabatan</label>
                                                <input name="jabatan" class="form-control" type="text" id="jabatan" readonly>
                                            </td>
                                            <td>
                                                <label  class="form-label">NPP</label>
                                                <input name="npp" class="form-control" type="text" id="npp" readonly>
                                            </td>
                                            <tr>
                                                <td>
                                                    <label  class="form-label">Status</label>
                                                    <input name="status" class="form-control" type="text" id="status" readonly>
                                                </td>
                                            </tr>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold"><span style="color: #2196F3;">Detail Pemasukan</span></td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td class="fw-bold">Honor</td>
                                    <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Honor Tenaga Pendidik</label>
                                            <input class="form-control" type="text" name="h_pendidikan" id="h_pen" readonly>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Honor Mengajar</label>
                                                <input class="form-control" type="text" name="h_mengajar" id="h_mengajar" readonly>
                                            </td>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <td class="fw-bold">Benefit Jabatan</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Nama Jabatan</label>
                                            <select class="form-select form-select w-100  mb-3" aria-label=".form-select-lg example" name="jabatan_t">
                                                <option selected>Jabatan Tambahan</option>
                                                <option value="Pembimbing">Pembimbing</option>
                                                <option value="Koordinator">Koordinator</option>
                                                <option value="Pembina">Pembina</option>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Honor Tugas Tambahan/Jabatan</label>
                                                <input class="form-control" type="text" name="h_tambahan">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Tunjangan Kelebihan Jam Mengajar</label>
                                            <input class="form-control" type="text" name="tj_kelebihan">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tunjangan Wali Kelas</label>
                                                <input class="form-control" type="text" name="tj_wali">
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tunjangan Koordinator Mata Pelajaran</label>
                                                <input class="form-control" type="text" name="tj_koordinator">
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold">Benefit Kinerja</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Tunjangan Kehadiran Bulan Ini</label>
                                            <input class="form-control" type="text" name="tj_kehadiran">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tunjangan Masa Depan</label>
                                                <input class="form-control" type="text" name="tj_kerja">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Tunjangan Kehadiran Masa Kerja & Tunjangan Pegawai Tetap</label>
                                            <input class="form-control" type="text" name="tj_tetap">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Tunjangan Keluarga</label>
                                                <input class="form-control" type="text" name="tj_keluarga">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>                        
                                <td class="fw-bold">Benefit Kepegawaian</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">BPJS Ketenagakerjaan Kewajiban Sekolah</label>
                                            <input class="form-control" type="text" name="bpjs_ketenagakerjaan">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">BPJS Kesehatan Kewajiban Sekolah</label>
                                                <input class="form-control" type="text" name="bpjs_kesehatan">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold">Lain-lain</td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Tunjakan Pajak BPMU/BOS</label>
                                            <input class="form-control" type="text" name="pajak_bpmu">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Lainnya</label>
                                                <input class="form-control" type="text" name="lain">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <td class="fw-bold"><span style="color: #2196F3;">Detail Potongan</span></td>
                                <td></td>
                                <td></td>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">BPJS Ketenagakerjaan Kewajiban Sekolah</label>
                                            <input class="form-control" type="text" name="p_bpjs_ketenagakerjaan_sekolah">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">BPJS Ketenagakerjaan Kesehatan Sekolah</label>
                                                <input class="form-control" type="text" name="p_bpjs_ketenagakerjaan_pegawai">
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">BPJS Kesehatan Kewajiban Sekolah</label>
                                                <input class="form-control" type="text" name="p_bpjs_kesehatan_sekolah">
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">BPJS Kesehatan Kewajiban Pegawai</label>
                                            <input class="form-control" type="text" name="p_bpjs_kesehatan_pegawai">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Pajak BPMU/BOS</label>
                                                <input class="form-control" type="text" name="p_pajak_bpmu">
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">PPH 21 (karena pendapatan > PTKP)</label>
                                                <input class="form-control" type="text" name="pph">
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">Potongan Kasbon</label>
                                            <input class="form-control" type="text" name="kasbon">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Infaq & Sodaqoh</label>
                                                <input class="form-control" type="text" name="infak">
                                            </td>
                                            <td>
                                                <label for="exampleInputform1" class="form-label">DPLK/Simponi</label>
                                                <input class="form-control" type="text" name="dplk">
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <label for="exampleInputform1" class="form-label">IDS Residence</label>
                                            <input class="form-control" type="text" name="ids_residence">
                                            <td>
                                                <label for="exampleInputform1" class="form-label">Lain-lain</label>
                                                <input class="form-control" type="text" name="p_lain">
                                            </td>
                                            <td></td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary mt-6" style="pandding:30%;width:100%;"><h3>Kirim</h3></button>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <script type="text/javascript">
                    function updateName() {
                        let $name = $('#id').val();
                        $('#name').val('');
                        $('#jabatan').val('');
                        $('#npp').val('');
                        $('#h_mengajar').val('');
                        $('#h_pen').val('');
                        $.ajax({
                            'url' : "{{ url('') }}/name/" + $name,
                            success : function(res) {
                                $('#jabatan').val(res.jabatan);
                                $('#npp').val(res.npp);
                                $('#name').val(res.name);
                                $('#status').val(res.status);
                                if(res.jabatan == 'Guru') {
                                    $('#h_pen').val('1000000')
                                    $('#h_mengajar').val('2800000')
                                } 
                                if(res.jabatan == 'Pembimbing') {
                                    $('#h_pen').val('1000000')
                                    $('#h_mengajar').val('2500000')
                                } 
                                if(res.jabatan == 'Laboran') {
                                    $('#h_pen').val('1000000')
                                    $('#h_mengajar').val('3000000')
                                } 
                                if(res.jabatan == 'Kesiswaan') {
                                    $('#h_pen').val('1000000')
                                    $('#h_mengajar').val('2700000')
                                } 
                                if(res.jabatan == 'TU') {
                                    $('#h_pen').val('1000000')
                                    $('#h_mengajar').val('2000000')
                                }
                            }
                        })
                    }
                </script>
                    @stop