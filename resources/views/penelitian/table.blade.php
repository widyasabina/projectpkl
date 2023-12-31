<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-dark text-capitalize ps-3">List Pendaftar Penelitian</h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <!-- Table header remains the same -->
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Unit Kerja</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Daftar</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the filtered data based on the provided status -->
                    @foreach ($pendaftaranMagang->where('status_pendaftaran', $status) as $pendaftaran)
                    <tr>
                        <!-- Remaining table body content -->
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $pendaftaran->mahasiswa->nama }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $pendaftaran->mahasiswa->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $pendaftaran->magang->balai->unit_kerja }}</p>
                            <p class="text-xs text-secondary mb-0">Kuota : {{ $pendaftaran->magang->balai->kuota }}</p>
                        </td>
                        <td class="align-middle text-center">
                            @php
                            $status = $pendaftaran->status_pendaftaran;
                            $badgeColor = '';
                            switch ($status) {
                                case 'Pending':
                                    $badgeColor = 'bg-gradient-warning'; // Orange color for "Pending"
                                    break;
                                case 'Diterima':
                                    $badgeColor = 'bg-gradient-success'; // Green color for "Diterima"
                                    break;
                                case 'Ditolak':
                                    $badgeColor = 'bg-gradient-danger'; // Red color for "Ditolak"
                                    break;
                                case 'Selesai':
                                    $badgeColor = 'bg-gradient-info'; // Blue color for "Selesai"
                                    break;
                                default:
                                    $badgeColor = 'bg-gradient-secondary'; // You can set a default color for other cases
                                    break;
                            }
                            @endphp
                            <span class="badge badge-sm {{ $badgeColor }}">{{ $status }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{ $pendaftaran->tanggal_pendaftaran }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="{{ route('magang.show', $pendaftaran->id) }}" class="btn btn-primary btn-sm">
                                View Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pendaftaranMagang->links('pagination') }}
        </div>
    </div>
</div>
