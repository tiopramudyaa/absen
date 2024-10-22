@extends('admin/index')
@section('content')

<!-- Main Content -->
<div class="container dashboard-content">
    <h1>MINGGU</h1>
    <p>Di sini Anda dapat mengakses berbagai fitur seperti Kelas, Penilaian, Riwayat Penilaian, dan Minggu.</p>

    <div class="mb-3">
        <a href="{{ url('/kelas/create') }}" class="btn btn-success">Tambah Minggu</a>
    </div>

    <!-- Tabel Daftar Minggu -->
    <table class="table table-striped table-bordered mt-4">
        <thead class="table-success">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Minggu</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping data minggu (contoh statis) -->
            @foreach($minggu as $index => $mingguItem)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $mingguItem->nama_minggu }}</td>
                <td class="text-center" style="vertical-align: middle;">
                    <a href="{{ url('/minggu/'.$mingguItem->id.'/nilai') }}" class="btn btn-primary btn-sm">Lihat Nilai</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection