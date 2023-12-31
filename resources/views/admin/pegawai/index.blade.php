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
                        <li class="active">
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
                <li class="">
                    <a style="text-decoration: none;" href="{{route('absen_admin')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>
            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')

                <div class="d-flex justify-content-between">
                    <div class="title">
                        <h3>Data Pegawai</h3>
                    </div>
                    <div class="location">
                        Home / Pegawai / <span style="color: #2196F3;">Data Pegawai</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-4">
                        <div class="cardd d-flex justify-content-between align-items-center" style="background-color: #3AC47D;">
                            <div class="desc">Pegawai Tetap</div>
                            <div class="count">{{$tetap}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="cardd d-flex justify-content-between align-items-center" style="background-color: #F7B924;">
                            <div class="desc">Pegawai Magang</div>
                            <div class="count">{{$magang}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="cardd d-flex justify-content-between align-items-center" style="background-color: #243A73;">
                            <div class="desc">Pegawai Total</div>
                            <div class="count">{{$total}}</div>
                        </div>
                    </div>
                  </div>
                  <br>
                  @if (session('success'))
                <div class="alert alert-success">
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

                  <!-- Table -->
                <table style="width:100%;margin-top:60px;">
                    <tr>
                        <td>
                            <form class="form" method="get" action="{{ route('cari_user') }}">
                                <div class="form-group w-100 mb-3">
                                    <label for="search" class="d-block mr-2">Pencarian</label>
                                    <input type="text" name="search" class="form-control d-inline" style="width:50%;" id="search" placeholder="Masukkan NPP Pegawai">
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('p_create') }}" class="btn mt-2 text-white" style="background-color: #2196F3;margin-left:65%;">
                            Tambah Data
                            </a>
                        </td>
                    </tr>
                </table>
                  <div class="wrapperTable table-responsive">
                    <table id="pegawaiTable" class="tables" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama & Jabatan</th>
                                <th>NPP</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <div class="nama fw-bold">{{ $user->name }}</div>
                                        <div class="jabatan">{{ $user->jabatan }}</div>
                                    </div>
                                </td>
                                <td>{{ $user->npp }}</td>
                                    <td>
                                    @if($user->status =='tetap')
                                            <div class="status status-primary">
                                            Tetap
                                            </div>
                                        @elseif($user->status =='magang')
                                            <div class="status status-warning">
                                            Magang
                                            </div>
                                            @else
                                                <div class="status status-danger">
                                                Keluar
                                                </div>
                                    @endif
                                    
                                </td>
                                <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('p_destroy', $user->id) }}" method="POST">
                                            <a style="text-decoration: none;"href="{{ route('p_edit', $user->id) }}"><button type="button" class="btn btn-sm btn-primary">EDIT</button></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                <div class="d-flex">       
                                </div>
                            </td>
                            @empty
                            <td valign="top" colspan="6" class="dataTables_empty">Tidak Data Pegawai</td>
                            </tr>
                            
                            @endforelse
                    </table>
                   </div>
                    @stop