@extends('admin/index')
@section('content')

<!-- Main Content -->
<div class="container dashboard-content">
    <h1>DAFTAR MAHASISWA</h1>
    <p>Di sini Anda dapat mengakses informasi mengenai mahasiswa.</p>

    <!-- TAMBAH KELAS -->
    <div class="mb-3">
        <a href="{{ url('/kelas/create') }}" class="btn btn-success">Tambah Mahasiswa individu</a>
    </div>

    <div class="mb-3">
        <a href="{{ url('/kelas/create') }}" class="btn btn-success">Tambah Mahasiswa sekelas</a>
    </div>

    <!-- Tabel Daftar Mahasiswa -->
    <table class="table table-striped table-bordered mt-4">
        <thead class="table-success">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NPM</th>
                <th scope="col">Kelas</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping data mahasiswa -->
            @foreach($mahasiswa as $index => $mahasiswaItem)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $mahasiswaItem->nama }}</td>
                <td>{{ $mahasiswaItem->npm }}</td>
                <td>{{ $mahasiswaItem->kelas->nama_kelas }}</td>

                <td class="text-center" style="vertical-align: middle;">
                    <a href="{{ url('/mahasiswa/'.$mahasiswaItem->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection