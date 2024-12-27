<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Join us for the International Research Conference 2024 at ITUM. Explore innovative sustainable engineering practices and technological advancements.">
    <title>International Research Conference 2024</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="https://th.bing.com/th/id/OIP.qpSyExxR_tD9UAKSuJsnRwHaD4?w=306&h=180&c=7&r=0&o=5&dpr=1.6&pid=1.7" alt="IRC Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#tracks">Tracks</a></li>
                <li><a href="#dates">Important Dates</a></li>
                <li><a href="#Schedule">Schedule</a></li>
                <li><a href="#registration">Registration</a></li>
                <li><a href="#speakers">Speakers</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="conference_adm/admin.php">Admin</a></li>

                
            </ul>
        </nav>
    </header>

    <section class="banner">
        <div class="banner-content">
            <h1>TECH.CON INTERNATIONAL RESEARCH CONFERENCE 2024</h1>
            <p class="theme">“Exploring New Frontiers: Innovative and Cross-disciplinary Approaches to Sustainable Engineering Practices”</p>
            <p class="date"><strong>18 DECEMBER 2024</strong></p>
            <p class="location">Institute of Technology, University of Moratuwa, Sri Lanka</p>
        </div>
        <div class="qr-code">
            <img src="https://th.bing.com/th/id/OIP.OpwGb2mNuBvkU9AMHUBLCAHaCn?rs=1&pid=ImgDetMain" alt="QR Code">
        </div>
    </section>

    <section id="about" class="details">
        <h2> International Research Conference of ITUM - 2024</h2>
        <p class="description">
            The Institute of Technology, University of Moratuwa (ITUM), launched its first-ever research symposium in 2013 with the goal of cultivating a robust research culture within the institution. Since then, it has become an annual hallmark of the ITUM calendar, serving as a distinguished platform to articulate and disseminate diverse and innovative research outcomes.
        </p>
    </section>

    <section id="tracks" class="details">
        
        

        <?php include 'tracks.php';?>

        
    </section>
    
    <section id="dates" class="details">
    <?php include 'dates.php'; ?>

    </section>
    
    <section id="Schedule" class="details">
    <?php include 'schedule.php'; ?>

    </section>
    
    <section id="registration" class="details">
        <h2>Registration</h2>
        <p class="description">
            Registration for TECH•CON 2024 is now open! To participate in the conference, please complete your registration by following the steps below:
        </p>
        <ul>
            <li>Click on the "Register Now" button below to create your account.</li>
            <li>Fill in the required information and choose your participation type (Presenter, Attendee, etc.).</li>
            <li>Make the necessary payment for registration (if applicable).</li>
            <li>Submit your registration form and receive a confirmation email.</li>
        </ul>
    
        <!-- Register Now Button -->
        <button onclick="window.location.href='register.html'">Register Now</button>
        <form action="register.php" method="POST" enctype="multipart/form-data" style="display:none;">
            <!-- Include hidden inputs or other form elements if needed -->
        </form>
    </section>
    
    <section id="speakers" class="details">
        <h2>Speakers</h2>
        <p class="description">
            TECH•CON 2024 will feature renowned speakers from various fields of technology, engineering, and sustainability. Here are some of our distinguished keynote speakers:
        </p>
        <ul>
            <li><strong>Dr. Jane Doe:</strong> Expert in Sustainable Engineering, University of XYZ</li>
            <li><strong>Prof. John Smith:</strong> AI Researcher, Tech Innovations Ltd.</li>
            <li><strong>Dr. Emily White:</strong> Green Energy Advocate, GreenTech Solutions</li>
        </ul>
        <p class="description">
            More speakers will be announced closer to the event date.
        </p>
    </section>
    
    <section id="contact" class="details">
        <h2>Contact Us</h2>
        <p class="description">
            For any inquiries, please feel free to reach out to us:
        </p>
        <ul>
            <li><strong>Email:</strong> contact@techcon2024.com</li>
            <li><strong>Phone:</strong> +94 123 456 789</li>
            <li><strong>Address:</strong> Institute of Technology, University of Moratuwa, Sri Lanka</li>
        </ul>
    </section>

    <section id="Admin" class="details">

    <li><a href="conference_adm/admin.php">Admin</a></li>


            </section>

    <footer>
        <p>&copy; 2024 International Research Conference - ITUM</p>
    </footer>
</body>
</html>
