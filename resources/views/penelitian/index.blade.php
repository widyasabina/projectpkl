<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="pendaftar"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Pendaftar Penelitian"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <!-- Add this part for tabs -->
            <ul class="nav nav-pills mb-4">
                <li class="nav-item">
                    <a class="nav-link active" id="diterima-tab" data-bs-toggle="pill" href="#diterima">Diterima</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pending-tab" data-bs-toggle="pill" href="#pending">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ditolak-tab" data-bs-toggle="pill" href="#ditolak">Ditolak</a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Diterima Tab Content -->
                <div class="tab-pane fade show active" id="diterima">
                    @include('magang.table', ['status' => 'Diterima'])
                </div>

                <!-- Pending Tab Content -->
                <div class="tab-pane fade" id="pending">
                    @include('magang.table', ['status' => 'Pending'])
                </div>

                <!-- Ditolak Tab Content -->
                <div class="tab-pane fade" id="ditolak">
                    @include('magang.table', ['status' => 'Ditolak'])
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
