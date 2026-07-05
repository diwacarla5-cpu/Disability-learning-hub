<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Learning Disabilities Learning System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Learning Disabilities Learning System</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php" class="active">About</a>
            <a href="lessons.php">Lessons</a>
            <a href="quiz.php">Quiz</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </div>
</header>

<section class="container">
    <h2>About Learning Disabilities</h2>

    <p>
        Learning disabilities are neurological conditions that affect how a
        person learns, understands, remembers, or processes information.
        They do not reflect a person's intelligence. With the right support,
        individuals with learning disabilities can succeed in school, work,
        and daily life.
    </p>

    <h3>Common Types</h3>

    <ul>
        <li><strong>Dyslexia</strong> – Difficulty with reading and spelling.</li>
        <li><strong>Dysgraphia</strong> – Difficulty with handwriting and writing.</li>
        <li><strong>Dyscalculia</strong> – Difficulty understanding numbers and mathematics.</li>
        <li><strong>ADHD</strong> – Difficulty maintaining attention, focus, and impulse control.</li>
        <li><strong>Auditory Processing Disorder (APD)</strong> – Difficulty processing sounds and spoken language.</li>
    </ul>

    <h3>How We Can Help</h3>

    <p>
        Our learning platform provides educational lessons, quizzes, and
        learning resources designed to increase awareness and understanding
        of learning disabilities. The goal is to promote inclusion,
        acceptance, and equal learning opportunities for everyone.
    </p>

    <a href="lessons.php" class="btn">Start Learning</a>
</section>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Learning Disabilities Learning System</p>
</footer>

</body>
</html>