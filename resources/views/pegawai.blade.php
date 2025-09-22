<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero-section {
            background-color: #7131e9;
            color: rgb(255, 255, 255);
            padding: 50px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
        }

        .card {
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(8, 8, 8, 0.1);
        }

        .footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #1ac8df;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">My Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1> Nama </h1>
            <p class="lead mb-0">M.Farid Fadillah</p>
        </div>
    </section>

        <!-- Umur -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h2>{{ $my_age }}</h2>
                    <p>Umur</p>
                </div>
            </div>
        </div>

        <!-- Hobi -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Hobi</h5>
                    <ul class="list-group">
                        @foreach ($hobbies as $hobi)
                            <li class="list-group-item">{{ $hobi }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Target Wisuda -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Target Wisuda</h5>
                    <p>{{ $tgl_harus_wisuda }}</p>
                </div>
            </div>
        </div>

        <!-- Sisa Hari -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Waktu Tersisa</h5>
                    <p>{{ $time_to_study_left }} hari lagi</p>
                </div>
            </div>
        </div>

        <!-- Semester -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Semester Saat Ini</h5>
                    <p>{{ $current_semester }}</p>
                </div>
            </div>
        </div>

        <!-- Motivasi -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Motivasi</h5>
                    <p>{{ $motivasi }}</p>
                </div>
            </div>
        </div>

        <!-- Future Goal -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Cita-cita / Tujuan</h5>
                    <p>{{ $future_goal }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

                <!-- Footer -->
                <footer class="footer">
                    <div class="container">
                        <p>&copy; {{ date('Y') }} My Laravel App. All Rights Reserved.</p>
                    </div>
                </footer>

                <!-- Bootstrap JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
