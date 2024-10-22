@extends('admin/index')
@section('content')

<!-- Main Content -->
<div class="container dashboard-content">
    <h1>{{$user['name']}}</h1>
    <h1>Selamat Datang di Dashboard</h1>
    <p>Di sini Anda dapat mengakses berbagai fitur seperti Kelas, Penilaian, Riwayat Penilaian, dan Minggu.</p>
    <!-- Tambahkan konten dashboard lainnya di sini -->
</div>

@endsection