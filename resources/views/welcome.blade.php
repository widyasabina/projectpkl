<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/dkpp.svg">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/dkpp.svg">
    <title>
    Sistem Informasi Pendaftaran PKL, Magang & Penelitian
    </title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to bottom, #EEFFFF, #FFFFFF);
        }
        .card {
            background-color: #CCE6DA; /* Green background color */
            color: black; /* White text color */
            min-height: 100%;
        }
        /* Add more custom styles as needed */
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-navbars.navs.guest signup='register' signin='login'></x-navbars.navs.guest>
            </div>
        </div>
    </div>
    <div class="page-header justify-content-center min-vh-100" id="about">
        <img src="{{ asset('assets/img/bulat.svg') }}" alt="Puskom Icon" class="img-fluid mt-3" style="position: absolute; top: 0; right: 0;">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Pesan Keberhasilan -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="text-center">
                <h1 class="text-dark">Sistem Informasi Pendaftaran PKL/ Magang & Penelitian</h1>
                <p class="text-suces">
                    Dinas Ketahanan Pangan dan Peternakan Jawa Barat adalah sebuah lembaga pemerintahan di provinsi Jawa Barat, Indonesia, yang bertanggung jawab dalam mengoordinasikan, mengembangkan, dan melaksanakan kebijakan serta program di bidang ketahanan pangan, pertanian, dan peternakan di wilayah Jawa Barat.
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($magang as $magangs)
            <div class="col-md-4 mb-4">
                <div class="card" id="daftar-magang">
                    <div class="card-body">
                        <div class="avatar position-relative ">
                            <i class="fa {{ $magangs->balai->icon }} " style="padding-left: 130px;"></i>
                        </div>
                        <h5 class="card-title text-center">{{ $magangs->balai->unit_kerja }}</h5>
                        <p class="card-text text-center">Kuota: {{ $magangs->balai->kuota }} Orang Tersisa</p>
                        <p class="card-text">{{ $magangs->balai->deskripsi }}</p>
                        <div class="text-center">
                            <a href="{{ route('daftar.magang', $magangs->id_balai) }}" class="btn btn-primary">Daftar Magang</a>
                            <a href="{{ route('daftar.penelitian', $magangs->id_balai) }}" class="btn btn-primary">Daftar Penelitian</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div><br>
    <footer class="text-center text-lg-start bg-light text-muted">
    <section class="footer"><br>
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4 text-center">
                <img src="{{ asset('assets') }}/img/dkpp.svg" alt="" width="200" /><br>
                <br>
                </i>Dinas Ketahanan Pangan dan Peternakan
                Jawa Barat
              </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Produk</h6>
              <p>
                <a href="#daftar-magang" >Daftar Magang</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Kerja Sama Dengan</h6>
              <p>
                <a href="https://jabarprov.go.id/" >Jabar Prov</a>
              </p>
              <p>
                <a href="http://dkpp.jabarprov.go.id/" >DKPP Jabar</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div id="footer-kontak" class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
              <p><i class="bi bi-house"></i> Jl. Kawaluyaan Indah Raya No.6 Lt.5 Soekarno-Hatta</p>
              <p><i class="bi bi-telephone"></i> <a href="https://wa.me/6282117457144">+62 821 17457144</a></p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
    </footer>
</body>
</html>
