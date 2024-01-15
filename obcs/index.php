<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page - Online Birth Certificate System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        /* Core Stylesheet */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        /* Header Styles */
        .header_area {
            background-color: #343a40;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
            padding: 15px 0;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar-brand {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
        }

        .navbar-toggler {
            border: none;
            background-color: transparent !important;
        }

        .navbar-toggler span {
            background-color: #fff;
            width: 30px;
            height: 3px;
            display: block;
            margin-top: 6px;
            transition: 0.3s;
        }

        .navbar-toggler span:nth-child(2) {
            margin-top: 6px;
        }

        .navbar-toggler span:nth-child(3) {
            margin-top: 6px;
        }

        .navbar-toggler:hover span {
            background-color: #ff6f61;
        }

        .navbar-collapse {
            background-color: #343a40;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav {
            margin-right: 20px;
        }

        .navbar-nav a {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            margin: 0 15px;
            padding: 8px 0;
            position: relative;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .navbar-nav a:hover {
            color: #ff6f61;
        }

        /* Hero Area Styles */
        .fancy-hero-area {
            position: relative;
            z-index: 1;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            background-size: cover;
            background-position: center center;
            animation: pulse 2s ;
        }

        .hero-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .hero-content h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            animation: fadeInDown 1s ease-in-out;
        }

        .hero-content p {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 0;
            line-height: 1.6;
            animation: fadeInUp 1s ease-in-out;
        }

        /* Animated Buttons Styles */
        .animated-buttons {
            margin-top: 30px;
        }

        .animated-buttons a {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            text-decoration: none;
            color: #fff;
            border: 2px solid #fff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            position: relative;
            overflow: hidden;
            animation: bounce 1s;
        }

        .animated-buttons a:before {
            content: '';
            background-color: #ff6f61;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: -100%;
            z-index: -1;
            transition: left 0.3s;
        }

        .animated-buttons a:hover {
            color: #	#61d7ff;
        }

        .animated-buttons a:hover:before {
            left: 0;
        }

        /* Footer Styles */
        .fancy-footer-area {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        .footer-copywrite-area {
            margin-top: 20px;
        }

        .copywrite-content {
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .copywrite-text {
            font-size: 14px;
        }

        .footer-nav nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-nav nav ul li {
            display: inline;
            margin-left: 15px;
        }

        .footer-nav nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        /* Additional Animations */
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }

            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-10px);
            }

            20%, 40%, 60%, 80% {
                transform: translateX(10px);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }

        /* @keyframes bounce {
            0%, 0%, 5%, 8%, 10% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        } */
    </style>

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg align-items-center">
                        <a class="navbar-brand" href="index.php">OBCS</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fancyNav"
                            aria-controls="fancyNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Hero Area Start ***** -->
    <div class="fancy-hero-area" style="background-image: url('img/Obirth.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 hero-content">
                    <h2 class="animated fadeInDown">Welcome to OBCS</h2>
                    <!-- <p class="animated fadeInUp">Your gateway to a hassle-free birth certificate application process.</p> -->
                    <div class="animated-buttons">
                        <a href="index.php">Home</a>
                        <!-- <a href="admin/login.php">Admin</a> -->
                        <a href="user/login.php">User</a>
                        <a href="user/search.php">Verify Certificate</a>
                        <a href="hospital/login.php">Hospital</a>
                        <a href="admin/login.php">Municipality</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="fancy-footer-area fancy-bg-dark">
        <!-- Footer Copywrite -->
        <div class="footer-copywrite-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copywrite-content d-flex align-items-center justify-content-between">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p>&copy; 2024 OBCS. All rights reserved.</p>
                            </div>
                            <!-- Footer Nav -->
                            <div class="footer-nav">
                                <nav>
                                    <ul>
                                        <!-- Add your footer navigation links here -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery-3.6.0 js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
