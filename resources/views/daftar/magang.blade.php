<x-layout bodyClass="g-sidenav-show bg-gray-200">
<style>
        body {
            background: linear-gradient(to bottom, #EEFFFF, #EEFFFF);
        }
        
</style>
    <div class="main-content position-relative bg-success-2 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.guest signup='register' signin='login'></x-navbars.navs.guest>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-50 border-radius-xl mt-7"></div>

            <div class="container px-4">
                 <!-- Pesan Error -->
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
                <!-- Move the card inside the container for proper alignment -->
                <div class="cards card-body mt-4">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <i class="fa {{ $magang->balai->icon }} border-radius-lg shadow-sm"></i>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">{{ $magang->balai->unit_kerja }}</h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    Kuota: {{ $magang->balai->kuota }} Orang Tersisa
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-3">Profile Information</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form method='POST' action="{{ route('magang.register') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Add your form fields here -->
                                <div class="row">
                                <input type="hidden" name="magang_id" value="{{ $magang->id }}">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">NIM</label>
                                    <input type="number" name="nim" class="form-control border border-2 p-2">
                                    @error('nim')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control border border-2 p-2">
                                    @error('nama')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select border border-2 p-2" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control border border-2 p-2" id="floatingTextarea2" name="alamat" rows="2" cols="50"></textarea>
                                    @error('alamat')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">No Telp</label>
                                    <input type="number" name="no_telepon" class="form-control border border-2 p-2">
                                    @error('no_telepon')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control border border-2 p-2">
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-3">Informasi Pendidikan</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Nama Instansi</label>
                                    <textarea class="form-control border border-2 p-2" id="floatingTextarea2" name="instansi" rows="1" cols="50"></textarea>
                                    @error('instansi')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Program Studi</label>
                                    <input type="text" name="program_studi" class="form-control border border-2 p-2">
                                    @error('program_studi')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Semester</label>
                                    <input type="number" name="semester" class="form-control border border-2 p-2">
                                    @error('semester')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-3">Dokumen</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">File Kesbangpol (PDF)</label>
                                    <input type="file" name="file_kesbangpol" class="form-control border border-2 p-2">
                                    @error('file_kesbangpol')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">File Proposal (PDF)</label>
                                    <input type="file" name="file_proposal" class="form-control border border-2 p-2">
                                    @error('file_proposal')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn bg-gradient-dark">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-plugins></x-plugins>
</x-layout>
<style>
    
    .cards {
        background-color: #FFFFFF;
        color: black; 
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }
    .avatar i {
        font-size: 64px; /* Icon color */
    }
    /* Add more custom styles as needed */
</style>
