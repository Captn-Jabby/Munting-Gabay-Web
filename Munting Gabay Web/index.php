<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munting Gabay</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column vh-100">
    <?php include('includes/header.php'); ?>

    <header class="bg-success text-white text-center py-5 fade-in">
        <div class="container">
            <h1 class="display-4">Welcome to Munting Gabay</h1>
            <p class="lead">Connecting communities for autism awareness and support</p>
            <a href="pages/about.php" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4 fade-in">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">We are dedicated to building a supportive community for autism awareness, connecting specialists and individuals seeking help.</p>
                        <a href="pages/about.php#mission" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 fade-in">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">Empowering individuals with autism and their families through knowledge and support, fostering understanding and inclusion.</p>
                        <a href="pages/about.php#vision" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 fade-in">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">What We Offer</h5>
                        <p class="card-text">Resources, forums, events, and more for autism awareness and support.</p>
                        <a href="pages/about.php#offer" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 fade-in">
                    <h2>Join Our Community</h2>
                    <p>Be a part of our mission to support and empower individuals with autism. Join our community forums, participate in events, and access valuable resources.</p>
                    <a href="pages/register.php" class="btn btn-success btn-lg">Get Started</a>
                </div>
                <div class="col-md-6 fade-in">
                    <img src="assets/images/doctor.png" class="img-fluid rounded-circle shadow-lg" style="max-width: 100%; height: auto;" alt="Community">
                </div>
            </div>
        </div>
    </section>

    <main class="container my-5">
        <div class="row mb-5 about-us-section">
            <div class="col-lg-6 fade-in">
                <h2>About Us</h2>
                <p>At Munting Gabay, we are dedicated to building a supportive community for autism awareness. Our mission is to connect doctors, specialists, and individuals seeking help with autism-related concerns. We believe in providing accessible resources and creating a platform where everyone can find the support they need.</p>
            </div>
            <div class="col-lg-6 fade-in">
                <img src="assets/images/icon.png" class="img-fluid" alt="About Us">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-4 mb-4 fade-in text-center">
                <h3>Empowerment Through Awareness</h3>
                <img src="assets/images/design.jpg" class="img-fluid" alt="Content 1">
                <p class="mb-0">Confidentially learn about early signs of autism.</p>
            </div>
            <div class="col-lg-4 mb-4 fade-in text-center">
                <h3>Confidential Autism Support</h3>
                <img src="assets/images/image1.jpg" class="img-fluid" alt="Content 2">
                <p class="mb-0">Discover early autism signs, enjoy therapeutic games, and track progress. Engage in seminars and forums for community support.</p>
            </div>
            <div class="col-lg-4 mb-4 fade-in text-center">
                <h3>Comprehensive Autism Care</h3>
                <img src="assets/images/images2.png" class="img-fluid" alt="Content 3">
                <p class="mb-0">Discreetly learn about autism, connect with professionals, track milestones and join seminars and forums for shared insights and support.</p>
            </div>
        </div>

    </main>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-success mb-4">Frequently Asked Questions (FAQs)</h2>
            <div class="accordion" id="faqs">
                <div class="card">
                    <div class="card-header" id="faq1">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-success" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                What is autism?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse1" class="collapse show" aria-labelledby="faq1" data-parent="#faqs">
                        <div class="card-body">
                            Autism, or autism spectrum disorder (ASD), refers to a broad range of conditions characterized by challenges with social skills, repetitive behaviors, speech, and nonverbal communication.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="faq2">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-success collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                How is autism diagnosed?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse2" class="collapse" aria-labelledby="faq2" data-parent="#faqs">
                        <div class="card-body">
                            Autism is diagnosed through a combination of developmental screenings, comprehensive diagnostic evaluations, and assessments by medical professionals.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="faq3">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-success collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                What resources are available for individuals with autism?
                            </button>
                        </h5>
                    </div>
                    <div id="collapse3" class="collapse" aria-labelledby="faq3" data-parent="#faqs">
                        <div class="card-body">
                            There are various resources available, including therapy services, educational programs, support groups, and online communities dedicated to providing information and assistance.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>