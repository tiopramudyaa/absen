@extends('admin/index')
@section('content')

<div class="container dashboard-content">
    <h1>Tambah Kelas</h1>
    <p>Silakan masukkan nama kelas yang ingin ditambahkan.</p>

    <!-- Form untuk Tambah Kelas -->
    <form action="{{ url('/kelas/create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Kelas</button>
        <a href="{{ url('/kelas') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection