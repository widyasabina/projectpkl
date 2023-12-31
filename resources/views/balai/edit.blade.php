<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="balai"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Edit Balai"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('balai.update', $balai->id) }}">
                                @csrf
                                @method('PUT')

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
                                @if (Auth::user() && Auth::user()->isAdmin)
                                <div class="mb-3">
                                    <label for="kuota" class="form-label">Kuota</label>
                                    <input type="number" class="form-control border border-2 p-2" id="kuota" name="kuota" value="{{ $balai->kuota }}" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Update Balai</button>
                                    <a href="{{ route('balai.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                                @endif
                                @if (Auth::user() && Auth::user()->isHumas)
                                <div class="mb-3">
                                    <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                    <input type="text" class="form-control border border-2 p-2" id="unit_kerja" name="unit_kerja" value="{{ $balai->unit_kerja }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kuota" class="form-label">Kuota</label>
                                    <input type="number" class="form-control border border-2 p-2" id="kuota" name="kuota" value="{{ $balai->kuota }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control border border-2 p-2" id="deskripsi" name="deskripsi" rows="3" required>{{ $balai->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon</label>
                                    <input type="text" class="form-control border border-2 p-2" id="icon" name="icon" value="{{ $balai->icon }}" required>
                                    <p class="mb-2 text-secondary">Masukkan kode icon Font Awesome</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Update Balai</button>
                                    <a href="{{ route('balai.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
