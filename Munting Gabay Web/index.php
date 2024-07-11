<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munting Gabay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include('includes/header.php'); ?>
    
    <header class="bg-success text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Welcome to Munting Gabay</h1>
            <p class="lead">Connecting communities for autism awareness and support</p>
            <a href="about.php" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">We are dedicated to building a supportive community for autism awareness, connecting specialists and individuals seeking help.</p>
                        <a href="about.php#mission" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">Empowering individuals with autism and their families through knowledge and support, fostering understanding and inclusion.</p>
                        <a href="about.php#vision" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">What We Offer</h5>
                        <p class="card-text">Resources, forums, events, and more for autism awareness and support.</p>
                        <a href="about.php#offer" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Join Our Community</h2>
                    <p>Be a part of our mission to support and empower individuals with autism. Join our community forums, participate in events, and access valuable resources.</p>
                    <a href="register.php" class="btn btn-success btn-lg">Get Started</a>
                </div>
                <div class="col-md-6">
                    <img src="assets/images/doctor.png" class="img-fluid rounded-circle shadow-lg" style="max-width: 100%; height: auto;" alt="Community">
                </div>
            </div>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
