<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="postingan"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Create Postingan Magang/Penelitian"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('postingan.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="balai_id" class="form-label">Unit Kerja</label>
                                    <select class="form-select border border-2 p-2" id="balai_id" name="balai_id" required>
                                        @foreach ($magang as $magangs)
                                            <option value="{{ $magangs->id }}">{{ $magangs->unit_kerja }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                    <select class="form-select border border-2 p-2" id="deskripsi" name="deskripsi" required>
                                        <option value="Magang">Magang</option>
                                        <option value="Penelitian">Penelitian</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="deadline_pendaftaran" class="form-label">Deadline Pendaftaran</label>
                                    <input type="date" class="form-control border border-2 p-2" id="deadline_pendaftaran" name="deadline_pendaftaran" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-primary">Create Postingan</button>
                                    <a href="{{ route('postingan.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
