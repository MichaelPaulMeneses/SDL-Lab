<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. John The Baptist Parochial School - Admission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .header {
            background-color: #4a90e2;
            color: white;
            padding: 10px 0;
        }
        .logo-text {
            font-weight: bold;
            font-size: 1rem;
        }
        .top-links {
            font-size: 0.9rem;
        }
        .top-links a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
            transition: opacity 0.3s;
        }
        .top-links a:hover {
            opacity: 0.8;
        }
        .banner {
            position: relative;
            background-color: white;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .admission-title {
            font-family: 'Brush Script MT', cursive;
            font-size: 4rem;
            color: #25478a;
            line-height: 1;
        }
        .is-now-open {
            font-size: 2rem;
            color: #25478a;
        }
        .red-text {
            color: #e63946;
        }
        .school-level {
            display: inline-block;
            margin: 5px;
            padding: 5px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .school-level:hover {
            transform: scale(1.05);
        }
        .preschool { background-color: #9c2c2c; }
        .grade-school { background-color: #4a90e2; }
        .junior-high { background-color: #f4a261; }
        .senior-high { background-color: #2a9d8f; }
        .abm { background-color: #264653; }
        .humss { background-color: #457b9d; }
        .stem { background-color: #e9c46a; color: #264653; }
        .free-tuition {
            background-color: #e1f5fe;
            color: #01579b;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(1, 87, 155, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(1, 87, 155, 0); }
            100% { box-shadow: 0 0 0 0 rgba(1, 87, 155, 0); }
        }
        .enroll-btn {
            background-color: #25478a;
            color: white;
            padding: 8px 25px;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .enroll-btn:hover {
            background-color: #1a365d;
            color: white;
        }
        .mission-vision {
            background-color: #4a90e2;
            color: white;
            border-radius: 10px;
            margin-top: 20px;
            padding: 20px;
        }
        .mission-vision-box {
            background-color: white;
            color: black;
            border-radius: 10px;
            padding: 15px;
            height: 100%;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .mission-vision-box:hover {
            transform: translateY(-5px);
        }
        .procedures {
            margin-top: 20px;
            padding: 20px;
        }
        .procedure-title {
            font-weight: bold;
            margin-bottom: 15px;
            color: #25478a;
        }
        .footer {
            background-color: #4a90e2;
            color: white;
            padding: 20px 0;
            margin-top: 20px;
        }
        .footer-text {
            font-size: 0.9rem;
        }
        .footer-social a {
            color: white;
            margin-left: 15px;
            font-size: 1.2rem;
            transition: transform 0.3s;
        }
        .footer-social a:hover {
            transform: scale(1.2);
        }
        .enrollment-highlight {
            background-color: #f8f9fa;
            border-left: 4px solid #4a90e2;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 0 5px 5px 0;
        }
        .procedure-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            transition: box-shadow 0.3s;
        }
        .procedure-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .call-to-action {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="logo.jpg" alt="School Logo" width="30" class="me-2">
                <span class="logo-text">ST. JOHN THE BAPTIST PAROCHIAL SCHOOL</span>
            </div>
            <div class="top-links">
                <a href="#procedures"><i class="fas fa-list-ul me-1"></i> Enrollment Procedures</a>
                <a href="https://bit.ly/sjbps25"><i class="fas fa-pen-to-square me-1"></i> Enroll Now</a>
                <a href="Login Form.php"><i class="fas fa-sign-in-alt me-1"></i> Log In</a>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="container banner">
        <div class="row align-items-center">
        <div class="col-md-4">
            <img src="Homepage" alt="Happy Students" class="img-fluid rounded banner-image">
        </div>
            <div class="col-md-8">
                <h1 class="admission-title">Admission</h1>
                <p class="mb-0">FOR ACADEMIC YEAR 2025 - 2026</p>
                <p class="is-now-open">is now open<span class="red-text">!</span></p>
                
                <div class="mt-3">
                    <span class="school-level preschool">PRESCHOOL</span>
                    <span class="school-level grade-school">GRADE SCHOOL</span>
                    <span class="school-level junior-high">JUNIOR HIGH SCHOOL</span>
                    <br>
                    <span class="school-level senior-high">SENIOR HIGH SCHOOL</span>
                    <span class="school-level abm">ABM</span>
                    <span class="school-level humss">HUMSS</span>
                    <span class="school-level stem">STEM</span>
                </div>
                
                <div class="free-tuition">
                    100% FREE TUITION FEE <small>(for incoming senior high school students)</small>
                </div>
                
                <div class="mt-4">
                    <a href="https://bit.ly/sjbps25" class="enroll-btn"><i class="fas fa-pen-nib me-2"></i>Enroll Now</a>
                    <p class="mt-3">Join our growing community of future leaders and innovators. Secure your spot today!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="container call-to-action">
        <h2>Shape Your Future with Quality Catholic Education</h2>
        <p class="mb-4">St. John The Baptist Parochial School offers a comprehensive learning experience that combines academic excellence, Christian values, and 21st century skills.</p>
        <a href="https://bit.ly/sjbps25" class="enroll-btn"><i class="fas fa-graduation-cap me-2"></i>Start Your Journey Today</a>
    </div>

    <!-- Mission Vision -->
    <div class="container mission-vision">
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="mission-vision-box">
                    <h3><i class="fas fa-bullseye me-2"></i>Mission</h3>
                    <p>The St. John the Baptist Parochial School commits itself as a living witness of Christ and as an agent of quality Catholic education in response to the mission of the Church by proclaiming the Gospel Values and providing 21st century competencies to the Johannine community through the spirit of St. sJohn.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mission-vision-box">
                    <h3><i class="fas fa-eye me-2"></i>Vision</h3>
                    <p>The St. John Baptist Parochial School envisions itself as globally academic competent community that embodies Christ's teachings.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Enrollment Procedures -->
    <div id="procedures" class="container procedures">
        <h2 class="text-center mb-4">ENROLLMENT PROCEDURES</h2>
        
        <div class="enrollment-highlight">
            <h5><i class="fas fa-info-circle me-2"></i>Important Information</h5>
            <p>Enrollment for the Academic Year 2025-2026 is now open. Early registrants can avail of special discounts and privileges. Senior High School applicants enjoy 100% FREE TUITION!</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="procedure-card">
                    <h4 class="procedure-title"><i class="fas fa-user-plus me-2"></i>For Transferee/New Students</h4>
                    <ol>
                        <li>Accomplish the online admission form at <a href="https://bit.ly/sjbps25" target="_blank">https://bit.ly/sjbps25</a> or you may visit the school office to fill out the admission form.</li>
                        <li>Submit the initial requirements at the Registrar's Office:
                            <ul>
                                <li>Original and Photocopy of Birth Certificate</li>
                                <li>Copy of Latest Report Card</li>
                                <li>Recent 2×2 ID Picture (2 pcs)</li>
                                <li>Good Moral Certificate</li>
                            </ul>
                        </li>
                        <li>The Guidance Counselor and/or the Academic Coordinator will conduct an assessment/interview of the student applicant.</li>
                        <li>Submit the other requirements for the official registration.</li>
                        <li>Pay the necessary fees at the Cashier's or Finance Office.</li>
                        <li>Check the school's official social media accounts for the latest announcements.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div class="procedure-card">
                    <h4 class="procedure-title"><i class="fas fa-user-check me-2"></i>For Old Students</h4>
                    <ol>
                        <li>Accomplish the online admission form at <a href="https://bit.ly/sjbps25" target="_blank">https://bit.ly/sjbps25</a> or you may visit the school office to fill out the admission form.</li>
                        <li>Proceed to the registrar's section to secure a permit to enroll.</li>
                        <li>Proceed to the Finance section for payment.</li>
                        <li>Submit the other requirements for the official registration.</li>
                        <li>Check the school's official social media accounts for the latest announcements.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="logo.jpg" alt="School Logo" width="30" class="me-2">
                        <span class="logo-text">ST. JOHN THE BAPTIST PAROCHIAL SCHOOL</span>
                    </div>
                    <div class="footer-text">
                        <p><i class="fas fa-map-marker-alt me-2"></i>Sumulong Street, Brgy. San Isidro, Taytay, Rizal Philippines</p>
                        <p><i class="fas fa-envelope me-2"></i> sjbps_10@yahoo.com</p>
                        <p><i class="fas fa-phone me-2"></i> (+632) 8296-5896 | 0920 122 5764</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/sjbps2003"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="mt-4">
                        <p>© 2025 St. John The Baptist Parochial School. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>