<?php
include 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'];

// Total Lessons
$lessonQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM lessons");
$lessonData = mysqli_fetch_assoc($lessonQuery);
$totalLessons = $lessonData['total'];

// Completed Lessons
$progressQuery = mysqli_query($conn, "SELECT COUNT(*) AS completed FROM progress WHERE user_id='$user_id' AND status='Completed'");
$progressData = mysqli_fetch_assoc($progressQuery);
$completedLessons = $progressData['completed'];

// Quiz Taken
$quizQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM quiz_results WHERE user_id='$user_id'");
$quizData = mysqli_fetch_assoc($quizQuery);
$totalQuiz = $quizData['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header>
    <div class="container">

        <h1>Learning Disabilities Learning System</h1>

        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="lessons.php">Lessons</a>
            <a href="quiz.php">Quiz</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </nav>

    </div>
</header>

<div class="container">

    <h2>Welcome, <?php echo htmlspecialchars($fullname); ?>!</h2>

    <div class="dashboard">

        <div class="card">
            <h3>Total Lessons</h3>
            <h1><?php echo $totalLessons; ?></h1>
        </div>

        <div class="card">
            <h3>Completed Lessons</h3>
            <h1><?php echo $completedLessons; ?></h1>
        </div>

        <div class="card">
            <h3>Quizzes Taken</h3>
            <h1><?php echo $totalQuiz; ?></h1>
        </div>

    </div>

    <div class="card">

        <h3>Quick Menu</h3>

        <p>Continue learning and improve your understanding of learning disabilities.</p>

        <a href="lessons.php" class="btn">Start Lessons</a>
        <a href="quiz.php" class="btn">Take Quiz</a>
        <a href="profile.php" class="btn">View Profile</a>

    </div>

</div>

<footer>
<p>&copy; <?php echo date("Y"); ?> Learning Disabilities Learning System</p>
</footer>

</body>
</html>