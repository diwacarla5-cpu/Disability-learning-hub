<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Disabilities Learning System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Learning Disabilities Learning System</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="lessons.php">Lessons</a>
            <a href="quiz.php">Quiz</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="container">
        <h2>Welcome!</h2>
        <p>
            This website helps learners understand learning disabilities
            through interactive lessons, quizzes, and educational resources.
        </p>

        <a href="lessons.php" class="btn">Start Learning</a>
    </div>
</section>

<section class="features">
    <div class="container">

        <div class="card">
            <h3>📖 Learn</h3>
            <p>Read educational modules about learning disabilities.</p>
        </div>

        <div class="card">
            <h3>📝 Quiz</h3>
            <p>Test your knowledge after every lesson.</p>
        </div>

        <div class="card">
            <h3>📊 Progress</h3>
            <p>Track your learning progress through your dashboard.</p>
        </div>

    </div>
</section>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Learning Disabilities Learning System</p>
</footer>

</body>
</html>