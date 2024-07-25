<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: seagreen;
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 0;
        }

        .main-image {
            max-width: 100%;
            height: auto;
        }

        .about-us-section {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="container">
            <h1>Welcome!</h1>
            <p class="lead">We are excited to have you here</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="row mb-5 about-us-section">
            <div class="col-lg-6">
                <h2>About Us</h2>
                <p>At Munting Gabay, we are dedicated to building a supportive community for autism awareness. Our mission is to connect doctors, specialists, and individuals seeking help with autism-related concerns. We believe in providing accessible resources and creating a platform where everyone can find the support they need.</p>
            </div>
            <div class="col-lg-6">
                <img src="assets/imgaes/icon.png alt=" Main Image" class="main-image">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-4">
                <h3>Content 1</h3>
                <img src="assets/imgaes/design.jpg" alt="Main Image" class="main-image">
                <p class="mb-0">Empowerment Through Awareness: Confidentially learn about early signs of autism.</p>
            </div>
            <div class="col-lg-4">
                <h3>Content 2</h3>
                <img src="assets/imgaes/image1.jpg" alt="Main Image" class="main-image">
                <p class="mb-0">Confidential Autism Support: Discover early autism signs, enjoy therapeutic games, and track progress. Engage in seminars and forums for community support.</p>
            </div>
            <div class="col-lg-4">
                <h3>Content 3</h3>
                <img src="assets/imgaes/images2.png" alt="Main Image" class="main-image">
                <p class="mb-0">Comprehensive Autism Care: Discreetly learn about autism, connect with professionals, track milestones and join seminars and forums for shared insights and support.</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h2>Autism</h2>
                <blockquote class="blockquote">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

                </blockquote>
            </div>
        </div>

    </main>

    <footer class="bg-success text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Munting Gabay. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>