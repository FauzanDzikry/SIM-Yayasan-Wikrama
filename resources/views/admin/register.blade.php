@extends('template.master')

    @section('title', 'Tambah AKun')
            @section('sidebar')
            <div class="sidebar-header">
                <h3><img src="{{url('template/admin/img/logoWk.png')}}" class="img-fluid"/><span>SIM YAYASAN</span></h3>
            </div>
            <ul class="list-unstyled components">
			    <li>
                    <a href="{{route('admin')}}" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>			
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">person</i><span>Pegawai</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li>
                            <a href="{{ route('p_admin') }}">Data Pegawai</a>
                        </li>
                        <li>
                            <a href="{{ route('p_create') }}">Create Pegawai</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">email</i><span>Surat Keputusan</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li>
                            <a href="{{ route('sk_admin') }}">Data Surat Keputusan</a>
                        </li>
                        <li>
                            <a href="{{ route('sk_create') }}">Create Surat Keputusan</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">folder</i><span>Slip Gaji</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li>
                            <a href="{{ route('sg_admin') }}">Data Slip Gaji</a>
                        </li>
                        <li>
                            <a href="{{ route('sg_create') }}">Create Slip Gaji</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{route('absen_admin')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>
                <li class="active">
                    <a href="{{route('registrasi')}}"><i class="material-icons">app_registration</i><span>Register</span></a>
                </li>

            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')
                <div class="d-flex justify-content-between mb-5">
                    <div class="title">
                        <h3>Tambah Akun</h3>
                    </div>
                    <div class="location">
                        Home /<span style="color: #2196F3;">Tambah Akun</span>
                    </div>

                </div>
                @if (session('danger'))
                <div class="alert alert-warning">
                    {{ session('danger') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                
                <a href="{{('admin')}}" class="d-flex align-items-center">
                    <ion-icon name="return-up-back-outline" class="mr-2"></ion-icon>
                    Back
                </a>
                <div class="content mt-3">
                    <h5>Tambah Akun</h5>
                    <hr>
                    <form action="{{ route('simpanregistrasi') }}" method="POST">
                            {{ csrf_field() }}
                            <label class="form-label">Name</label>
                        <select class="form-select form-select w-100  mb-3" name="name" id="jabatan">
                        
                            <option selected>Pilih Nama</option>
                            @foreach($posts as $post)
                            <option value="{{$post->name}}">{{$post->name}}</option>
                            @endforeach
                          </select>
                        <label class="form-label">NPP</label>
                        <select class="form-select form-select w-100  mb-3" name="npp" id="jabatan">
                            <option selected>Pilih NPP</option>
                            @foreach($posts as $post)
                            <option value="{{$post->npp}}">{{$post->npp}}</option>
                            @endforeach
                          </select>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name = "password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #2196F3;">Simpan</button>
                      </form>
                </div>
                    @stop