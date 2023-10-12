<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <title>SIM Yayasan - @yield('title')</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('template/admin/css/bootstrap.min.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	    <!----css3---->
        <link rel="stylesheet" href="{{url('template/admin/css/custom.css')}}">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- Data Table -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
	    <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
      <!--  -->
      <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
  </head>
  <body>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <!-- Sidebar  -->
            <nav id="sidebar">
                @yield('sidebar')
            </nav>

        <!-- Page Content  -->
        <div id="content">
		
		<div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">   
                            <li class="dropdown nav-item">
                                <a href="#" class="nav-link d-flex" data-toggle="dropdown">
                                    <span class="material-icons">person</span><span class="ml-2" style="color:white;">{{ Auth::user()->name }}</span>
                               </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a style="text-decoration: none;" href="{{url('logout')}}">logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
	    </div>
			<div class="main-content">
                @yield('content')
		    </div>
        </div>
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="{{url('template/admin/js/jquery-3.3.1.slim.min.js')}}"></script>
   <script src="{{url('template/admin/js/popper.min.js')}}"></script>
   <script src="{{url('template/admin/js/bootstrap.min.js')}}"></script>
   <script src="{{url('template/admin/js/jquery-3.3.1.min.js')}}"></script>
   <!--Datatable By Bootstrap-->
   <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- IonIcon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">  
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--  -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
 
 <script type="text/javascript">     
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });
</script>
<script>
        window.setTimeout("waktu()", 1000);
     
        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
</script>
    <script>
        $(document).ready(function() {
            $('#pegawaiTable').DataTable({
                "filter" :false,
                "sort" :false,
                "info" :false,
                "paginate" :false,
                
            });
        } );
    </script>
  </body>
  </html>