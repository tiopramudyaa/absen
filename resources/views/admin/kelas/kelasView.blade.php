@extends('admin/index')
@section('content')

<!-- Main Content -->
<div class="container dashboard-content">
    <!-- <h1>{{$user['name']}}</h1> -->
    <h1>KELAS</h1>
    <p>Di sini Anda dapat mengakses berbagai fitur seperti Kelas, Penilaian, Riwayat Penilaian, dan Minggu.</p>

    <!-- tambah KELASS -->
    <div class="mb-3">
        <a href="{{ url('/kelas/create') }}" class="btn btn-success">Tambah Kelas</a>
    </div>

    <!-- Tabel Daftar Kelas -->
    <table class="table table-striped table-bordered mt-4">
        <thead class="table-success">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping data kelas (contoh statis) -->
            @foreach($kelas as $index => $kelasItem)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $kelasItem->nama_kelas }}</td>
                <td class="text-center">
                    <a href="{{ url('/mahasiswa/' . $kelasItem->id) }}" class="btn btn-primary btn-sm me-4">Lihat Siswa</a>
                    <a href="{{ url('/kelas/edit/' . $kelasItem->id) }}" class="btn btn-warning btn-sm me-4">Edit</a>
                    <a href="{{ url('/kelas/delete/' . $kelasItem->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection