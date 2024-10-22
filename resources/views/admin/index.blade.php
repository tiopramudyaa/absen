<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            /* Warna putih-biru untuk background */
        }

        .navbar {
            background-color: #28a745;
            /* Warna hijau untuk navbar */
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .dropdown-menu {
            background-color: #28a745;
            /* Warna hijau untuk dropdown */
        }

        .dropdown-item {
            color: #ffffff;
        }

        .dropdown-item:hover {
            background-color: #20c997;
            /* Warna hijau muda saat hover */
        }

        .dashboard-content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .dashboard-content h1 {
            color: #007bff;
            /* Warna biru untuk judul */
        }

        .dashboard-content p {
            color: #6c757d;
        }

        .active {
            font-weight: bold;
            /* text-decoration: underline; */
        }

        .nav-link {
            transition: background-color 0.3s, color 0.3s;
            /* Transisi saat hover */
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            /* Warna latar belakang saat hover */
            color: #ffffff;
            /* Mengubah warna teks saat hover */
        }

        .active {
            background-color: #20c997;
            /* Warna latar belakang untuk item aktif */
            border-radius: 5px;
            /* Memberikan sudut bulat */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kelas') ? 'active' : '' }}" href="{{ url('/kelas') }}">
                            <i class="bi bi-book"></i> Kelas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('nilai') ? 'active' : '' }}" href="{{ url('/nilai') }}">
                            <i class="bi bi-pencil"></i> Penilaian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('minggu') ? 'active' : '' }}" href="{{ url('/minggu') }}">
                            <i class="bi bi-calendar"></i> Minggu
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$user['name']}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>