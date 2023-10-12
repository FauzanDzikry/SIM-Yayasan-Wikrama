<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{url('template/login/style.css')}}">

        <title>SMK Wikrama - Login</title>
    </head>
    <body class="bg-blue1">
        <div style="margin-top:8%;" class="container mb-5 bg-white card-content p-5">
                        {{-- Error Alert --}}
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
            <div class="d-flex flex row">
                <div class="col-lg-6 mt-3 pl-md-5">
                    <div class="d-flex">
                        <img src="{{url('template/login/logo.svg')}}" class="img-logo"/> 
                        <span class="welcome-text mt-3">selamat datang</span> 
                    </div>
                    <h3 class="title">Aplikasi SIM Yayasan</h3>
                    <span class="desc-app">SIM Yayasan - Admin / Karyawan merupakan aplikasi induk dalam manajemen yayasan SMK Wikrama Bogor.</span>
                    <div class="input-field d-flex flex-column mt-4"> 
                        <form action="{{url('proses_login')}}" method="POST" id="logForm">
                        {{ csrf_field() }}
                                                @error('login_gagal')
                                                    {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> --}}
                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @enderror
                            <input type="text" name="npp"class="form-control email" for="inputEmailAddress" placeholder="NPP">
                            @if($errors->has('NPP'))
                                <span class="error">{{ $errors->first('npp') }}</span>
                            @endif
                            <div class="d-flex">
                                <input type="password" class="form-control" placeholder="Password" id="inputPassword" name="password"> 
                                <i class="far fa-eye toggle-pw" id="togglePassword"></i>
                            </div> 
                            @if($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button style="active:" class="mt-4 btn btn btn-primary d-flex justify-content-center align-items-center" type="submit">Masuk</button>
                                </div>
                            </div>
                            </form>
                            <div class="mt-2 text1"> 
                                <span class="mt-3 forget">Untuk bantuan, hubungi CS <a href="#">di sini</a></span> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-lg-flex d-none mt-3">
                        <div class="image-box">
                            <img src="{{url('template/login/login.png')}}" class="img-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{url('template/login/script.js')}}"></script>
    </body>
</html>