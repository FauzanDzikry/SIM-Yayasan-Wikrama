@extends('template.master')

    @section('title', 'Slip Gaji ')
            @section('sidebar')
            <div class="sidebar-header">
                <h3><img src="{{url('template/admin/img/logoWk.png')}}" class="img-fluid"/><span>SIM YAYASAN</span></h3>
            </div>
            <ul class="list-unstyled components">
			<li class="">
                    <a href="{{route('user')}}" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>
		
		      <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">notifications</i><span> 4 notification</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                                    <li>
                                    <a href="#">You have 5 new messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Mike</a>
                                    </li>
                                    <li>
                                        <a href="#">Wish Mary on her birthday!</a>
                                    </li>
                                    <li>
                                        <a href="#">5 warnings in Server Console</a>
                                    </li>
                    </ul>
                </li>
				</div>
                <li class="">
                    <a href="{{route('sk')}}"><i class="material-icons">email</i><span>Surat Keputusan</span></a>
                </li>
                <li class="active">
                    <a href="{{route('gaji')}}"><i class="material-icons">folder</i><span>Slip Gaji</span></a>
                </li>

                <li class="">
                    <a href="{{route('absen')}}"><i class="material-icons">date_range</i><span>Absen</span></a>
                </li>

            </ul>
        @stop
        <!-- End of Sidebar -->
                @section('content')
                <div class="d-flex justify-content-between">
                    <div class="title">
                        <h3>Slip Gaji</h3>
                    </div>
                    <div class="location">
                        Home / <span style="color: #2196F3;">Slip Gaji</span>
                    </div>
                </div>
                <div class="wrapperTable table-responsive">
                    <table id="pegawaiTable" class="tables" style="width:100%">
                        <thead>
                            <tr>
                                <th><span style="color: #2196F3;">Slip Gaji {{ Auth::user()->name }}</span><hr></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($gajis as $gaji)
                            <tr>
                            @if ($gaji->npp == Auth::user()->npp)
                                <th>Surat Keputusan diupdate pada tanggal:</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><h2>{{$gaji->tanggal}}</h2></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('print', $gaji->id) }}" target="_blank"><button class="status status-primary border-0" down><h4>Download Slip Gaji</h4></button></a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                   </div>
                    @stop