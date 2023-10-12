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
                        <li class="active">
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
                <li class="">
                    <a href="{{route('absen_admin')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>
            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')
                <div class="d-flex justify-content-between">
                    <div class="title">
                        <h3>Surat Keputusan</h3>
                    </div>
                    <div class="location">
                        Home / Pegawai / <span style="color: #2196F3;">Surat Keputusan</span>
                    </div>
                </div>
                  <br>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('destroy'))
                <div class="alert alert-danger">
                    {{ session('destroy') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
                @endif
                <table style="width:100%;margin-top:60px;">
                    <tr>
                        <td>
                            <form class="form" method="get" action="{{ route('cari_sk') }}">
                                <div class="form-group w-100 mb-3">
                                    <label for="search" class="d-block mr-2">Pencarian</label>
                                    <input type="text" name="search" class="form-control d-inline" style="width:60%;" id="search" placeholder="Masukkan NPP Pegawai">
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('sk_create') }}"style="margin-left:45%;">
                                <button type="button" style="padding:8px;margin-top:0.5rem;" class="btn btn-sm btn-primary">
                                Tambah Surat Keputusan
                                </button>
                            </a>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data Surat Kerja ?');" action="{{ route('sk_hapus')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="margin-left:20%;padding:8px;margin-top:0.5rem;"class="btn btn-sm btn-danger">Hapus seluruh data SK</button>
                             </form>
                        </td>
                    </tr>
                </table>
                <div class="wrapperTable table-responsive">
                    <table id="pegawaiTable" class="tables" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NPP</th>
                                <th>Status</th>
                                <th>Tanggal Dikirim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($sks as $sk)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="nama fw-bold">{{ $sk->name }}</div>
                                        <div class="jabatan">{{ $sk->jabatan }}</div>
                                    </div>
                                </td>
                                <td>{{ $sk->npp }}</td>
                                <td>
                                @if($sk->status =='tetap')
                                        <div class="status status-primary">
                                        Tetap
                                        </div>
                                    @elseif($sk->status =='magang')
                                        <div class="status status-warning">
                                        Magang
                                        </div>
                                        @else
                                            <div class="status status-danger">
                                            Keluar
                                            </div>
                                </td>
                                @endif
                                <td>{{ $sk->tanggal_sk }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('sk_destroy', $sk->id) }}" method="POST">
                                            <a href="{{ url('/sk/'.$sk->file) }}"download><button type="button" class="btn btn-sm btn-primary">Surat Keputusan</button></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                </td>
                                @empty
                            <td valign="top" colspan="6" class="dataTables_empty">Tidak Data Surat Keputusan Pegawai</td>
                            </tr>
                            @endforelse
                            </tbody>
                    </table>
                </div>
                    @stop