<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="pendaftar"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
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
            <div class="page-header min-height-50 border-radius-xl mt-7">
                </div>
             
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                        <i class='fa " . {{ $pendaftaranMagang->magang->balai->icon }} . " border-radius-lg shadow-sm'></i>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                            <h5 class="mb-1">
                            {{ $pendaftaranMagang->magang->balai->unit_kerja }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Kuota : {{ $pendaftaranMagang->magang->balai->kuota }} Orang Tersisa
                            </p>
                        </div>
                    </div>
                </div>
                             
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Profile Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form method="POST" action="{{ route('magang.terima', $pendaftaranMagang->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">NIM</label>
                                    <input type="number" name="nim" class="form-control border border-2 p-2" value="{{ $pendaftaranMagang->mahasiswa->nim }}" disabled>
                                    @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control border border-2 p-2" value="{{ $pendaftaranMagang->mahasiswa->nama }}" disabled>
                                    @error('nama')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" class="form-control border border-2 p-2" value="{{ $pendaftaranMagang->mahasiswa->jenis_kelamin }}" disabled>
                                    @error('jenis_kelamin')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control border border-2 p-2" id="floatingTextarea2" name="alamat"
                                        rows="2" cols="50" value="" disabled>{{ $pendaftaranMagang->mahasiswa->alamat }}</textarea>
                                    @error('alamat')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">No Telp</label>
                                    <input type="text" name="no_telepon" class="form-control border border-2 p-2" value="{{ $pendaftaranMagang->mahasiswa->no_telepon }}" disabled>
                                    @error('no_telepon')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control border border-2 p-2" value="{{ $pendaftaranMagang->mahasiswa->email }}" disabled>
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
                                    <textarea class="form-control border border-2 p-2" id="floatingTextarea2" name="instansi"
                                        rows="1" cols="50" disabled>{{ $pendaftaranMagang->mahasiswa->instansi }}</textarea>
                                    @error('instansi')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Program Studi</label>
                                    <input type="text" name="program_studi" class="form-control border border-2 p-2"  value="{{ $pendaftaranMagang->mahasiswa->program_studi }}" disabled>
                                    @error('program_studi')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Semester</label>
                                    <input type="number" name="semester" class="form-control border border-2 p-2"  value="{{ $pendaftaranMagang->mahasiswa->semester }}" disabled>
                                    @error('semester')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-3">Informasi Pendaftaran Magang</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Tanggal Pendaftaran</label>
                                    <input type="date" name="tanggal_pendaftaran" class="form-control border border-2 p-2"  value="{{ $pendaftaranMagang->tanggal_pendaftaran }}" disabled>
                                    @error('tanggal_pendaftaran')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Status Pendaftaran</label>
                                    <input type="text" name="status_pendaftaran" class="form-control border border-2 p-2"  value="{{ $pendaftaranMagang->status_pendaftaran }}" disabled>
                                    @error('status_pendaftaran')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                
                                
                                <div class="mb-3 col-md-6">
                                <label class="form-label">PDF File Kesbangpol</label>
                                <a href="{{ route('pdf.show', ['filename' => $pendaftaranMagang->file_kesbangpol]) }}" target="_blank"><br> <i class="fa fa-file-pdf ms-2"></i> View File</a>
                                    @error('file_kesbangpol')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                <label class="form-label">PDF File Proposal</label>
                                <a href="{{ route('pdf.show', ['filename' => $pendaftaranMagang->file_proposal]) }}" target="_blank"><br> <i class="fa fa-file-pdf ms-2"></i> View File</a>
                                    @error('file_kesbangpol')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                            </div><br>
                            <div class="d-flex justify-content-between">
                                <!-- ... Your existing code ... -->
                                @if ($pendaftaranMagang->status_pendaftaran == 'Diterima')                                      
                                        <form method="POST" action="{{ route('magang.selesai', $pendaftaranMagang->id) }}">
                                            @csrf
                                            @method('PUT')                                            
                                            <input type="hidden" name="status_pendaftaran" value="Selesai">
                                            <button type="submit" class="btn btn-primary" disabled>Selesai</button>
                                        </form>
                                        <form method="POST" action="{{ route('magang.selesai', $pendaftaranMagang->id) }}">
                                            @csrf
                                            @method('PUT')                                            
                                            <input type="hidden" name="status_pendaftaran" value="Selesai">
                                            <button type="submit" class="btn btn-info">Selesai</button>
                                        </form>
                                        <a href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>                                                
                                    @elseif ($pendaftaranMagang->status_pendaftaran == 'Ditolak')
                                        <a href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>
                                    @elseif ($pendaftaranMagang->status_pendaftaran == 'Pending')
                                        <form method="POST" action="{{ route('magang.terima', $pendaftaranMagang->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status_pendaftaran" value="Diterima">
                                            <button type="submit" class="btn btn-success">Terima</button>
                                        </form>
                                        <form method="POST" action="{{ route('magang.tolak', $pendaftaranMagang->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                        </form>
                                        <a href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>
                                    @else
                                    <a href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>
                                    @endif
                                <!-- ... Your existing code ... -->

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
