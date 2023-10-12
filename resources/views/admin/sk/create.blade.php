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
                            <a  style="text-decoration: none;" href="{{ route('sk_admin') }}">Data Surat Keputusan</a>
                        </li>
                        <li class="active">
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
                        <h3>Surat Keputusan</h3>
                    </div>
                    <div class="location">
                        Home / Pegawai / <span style="color: #2196F3;">Surat Keputusan</span>
                    </div>

                </div>
                <a style="text-decoration: none;" href="{{route('sk_admin')}}" class="d-flex align-items-center">
                    <ion-icon name="return-up-back-outline" class="mr-2"></ion-icon>
                    Back
                </a>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="content mt-3">
                    <h5>Upload Surat Keputusan (SK)</h5>
                    <hr>
                        <form action="{{route('sk_store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <a id="templateSK" style="margin-left: 90%;color:white;"  download><p class="btn btn-primary mt-6" style="color:white;">
                                Template</p></a>
                                <div class="form-group">
                                    <label for="npp">Dikirim Kepada NPP Pegawai</label>
                                    <select class="form-select form-select w-100  mb-3" id="id" onchange="updateNpp();">
                                        <option selected>Pilih NPP Pegawai</option>
                                        @foreach($sks as $sk)
                                        <option value="{{ $sk->id}}">{{ $sk->npp}}</option>
                                            @endforeach
                                    </select>
                                    <input name="npp" class="form-control" type="hidden" id="npp">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input name="name" class="form-control" type="text" id="name" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jabatan</label>
                                    <input name="jabatan" class="form-control" type="text" id="jabatan" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <input name="status" class="form-control" type="text" id="status" readonly>
                                </div>
                                <div class="form-group">
                                <input type="file" name="file">
                                    @if($errors->has('file'))
                                        <small class="error">{{ $errors->first('file') }}</small>
                                    @endif
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary mt-6">Upload</button>
                        </form>
                </div>
                <script type="text/javascript">
                    function updateNpp() {
                        let $sks = $('#id').val();
                        $('#npp').val('');
                        $('#name').val('');
                        $('#jabatan').val('');
                        $('#status').val('');
                        $.ajax({
                            'url' : "{{ url('') }}/npp/" + $sks,
                            success : function(res) {
                                $('#jabatan').val(res.jabatan);
                                $('#npp').val(res.npp);
                                $('#name').val(res.name);
                                $('#status').val(res.status);
                            }
                        })
                    }
                    document.getElementById("templateSK").addEventListener("click", function() {
                        // URL yang ingin Anda buka di tab baru
                        var newTabUrl = "https://drive.google.com/drive/folders/1IG8gPAk-cZzZZGbSg-T0kM_JWaxKuknI?usp=sharing";

                        // Buka tab baru
                        var newTab = window.open(newTabUrl, "_blank");
                        
                        // Fokuskan tab baru (jika diizinkan oleh browser)
                        if (newTab) {
                            newTab.focus();
                        }
                    });
                </script>
                    @stop