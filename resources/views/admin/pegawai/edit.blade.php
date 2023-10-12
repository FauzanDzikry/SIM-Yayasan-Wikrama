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
                <div class="d-flex justify-content-between mb-5">
                    <div class="title">
                        <h3>Edit Data Pegawai</h3>
                    </div>
                    <div class="location">
                        Home / Pegawai / <span style="color: #2196F3;">Edit Data Pegawai</span>
                    </div>

                </div>

                
                <a style="text-decoration: none;" href="{{route('p_admin')}}" class="d-flex align-items-center">
                    <ion-icon name="return-up-back-outline" class="mr-2"></ion-icon>
                    Back
                </a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                    </div>
                @endif
                <div class="content mt-3">
                    <h5>Edit Data Pegawai</h5>
                    <hr>
                    <form action="{{ route('p_update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NPP</label>
                            <input type="number" name="npp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$user->npp}}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text"name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">
                        </div>
                        <label for="exampleInputEmail1" class="form-label">jabatan</label>
                        <select class="form-select form-select w-100  mb-3" name="jabatan" aria-label=".form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="Guru" {{ $user->jabatan == "Guru" ? 'selected':'' }}>Guru</option>
                            <option value="Laboran" {{ $user->jabatan == "Laboran" ? 'selected':'' }}>Laboran</option>
                            <option value="Pembimbing"{{ $user->jabatan == "Pembimbing" ? 'selected':'' }}>Pembimbing</option>
                            <option value="Kesiswaan"{{ $user->jabatan == "Kesiswaan" ? 'selected':'' }}>Kesiswaan</option>
                            <option value="TU"{{ $user->jabatan == "TU" ? 'selected':'' }}>TU</option>
                          </select>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name = "password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status Kepegawaian</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="tetap" {{ ($user->status=="tetap")? "checked" : "" }}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                Tetap
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="magang" {{ ($user->status=="magang")? "checked" : "" }}>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Magang
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="background-color: #2196F3;">Simpan</button>
                      </form>
                </div>
                    @stop