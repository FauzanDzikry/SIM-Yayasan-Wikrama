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
                        <li class="">
                            <a style="text-decoration: none;" href="{{ route('sg_create') }}">Create Slip Gaji</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a style="text-decoration: none;" href="{{route('absen_admin')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>
            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')
                <div class="d-flex justify-content-between">
                    <div class="title">
                        <h3><img src="{{url('template/pegawai/img/Frame 3.png')}}" class="img-fluid"> Data Absensi</h3>
                    </div>
                    <div class="location">
                        Home / Absensi / <span style="color: #2196F3;">Data Absensi</span>
                    </div>
                </div>
                <tr>
                <table style="width:100%;margin-top:60px;">
                    <tr>
                        <td>
                            <form class="form" method="get" action="{{ route('search') }}">
                                <div class="form-group w-100 mb-3">
                                    <label for="search" class="d-block mr-2">Pencarian</label>
                                    <input type="text" name="search" class="form-control d-inline" style="width:50%;" id="search" placeholder="Masukkan Nama Pegawai">
                                </div>
                            </form>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data absensi ?');"action="{{ route('absen_hapus')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="margin-left:55%;padding:10px;"class="btn btn-sm btn-danger">Hapus seluruh data Absensi</button>
                            </form>
                        </td>
                    </tr>
                </table>
                </tr>
            

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('destroy'))
                <div class="alert alert-warning">
                    {{ session('destroy') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                  <div class="wrapperTable table-responsive">
                    <table id="pegawaiTable" class="tables" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NPP</th>
                                <th>Jam Masuk</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($absens as $absen)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="nama fw-bold">{{ $absen->name }}</div>
                                    </div>
                                </td>
                                <td>{{ $absen->npp }}</td>
                                <td>
                                {{ $absen->jam_masuk }}
                                </td>
                                <td>{{ $absen->tanggal }}</td>
                                <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('absen_destroy', $absen->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                        </td>
                                        @empty
                                        <td valign="top" colspan="6" class="dataTables_empty">Tidak ada pegawai yang melakukan absen</td>
                            </tr>
                            
                            @endforelse
                        </tbody>
                        
                    </table>
                   </div>
                    @stop