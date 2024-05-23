<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crowdfunding Website</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
        }
        .campaign-card {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Crowdfunding</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Campaigns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" href="#">Start a Campaign</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12 text-center">
                <h1>Support a Cause, Make a Difference</h1>
                <p class="lead">Donate to campaigns that need your help.</p>
            </div>
        </div>
        <div class="row">
            <!-- Example Campaign Card -->
            <div class="col-md-4 campaign-card">
                <div class="card">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Campaign Image">
                    <div class="card-body">
                        <h5 class="card-title">Campaign Title</h5>
                        <p class="card-text">Short description of the campaign.</p>
                        <a href="#" class="btn btn-primary">Donate Now</a>
                    </div>
                </div>
            </div>
            <!-- Repeat Campaign Card as needed -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; 2024 Crowdfunding. All Rights Reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
