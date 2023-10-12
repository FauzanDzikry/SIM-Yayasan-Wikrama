@extends('template.master')

    @section('title', 'Dashboard')
            @section('sidebar')
            <div class="sidebar-header">
                <h3><img src="{{url('template/admin/img/logoWk.png')}}" class="img-fluid"/><span>SIM YAYASAN</span></h3>
            </div>
            <ul class="list-unstyled components">
			    <li  class="active">
                    <a href="{{route('admin')}}" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
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
                        <li>
                            <a style="text-decoration: none;" href="{{ route('sk_admin') }}">Data Surat Keputusan</a>
                        </li>
                        <li>
                            <a  style="text-decoration: none;" href="{{ route('sk_create') }}">Create Surat Keputusan</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">folder</i><span>Slip Gaji</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <li>
                            <a style="text-decoration: none;" href="{{ route('sg_admin') }}">Data Slip Gaji</a>
                        </li>
                        <li>
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
                        <h3>Dashboard</h3>
                    </div>
                    <div class="location">
                        Home / <span style="color: #2196F3;">Dashboard</span>
                    </div>
                </div>
                <br>
                <br>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Selamat Datang {{ Auth::user()->name }}
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <strong>Halaman ini hanya bisa di bukan oleh admin</strong>
                        </div>
                    </div>
                </div>
                    @stop