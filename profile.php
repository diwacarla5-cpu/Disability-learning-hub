<?php
include 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($userQuery);

$quizHistory = mysqli_query($conn, "SELECT * FROM quiz_results WHERE user_id='$user_id' ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>

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

<div class="card">

<h2>My Profile</h2>

<p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['fullname']); ?></p>

<p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>

<p><strong>Member Since:</strong> <?php echo date("F d, Y", strtotime($user['created_at'])); ?></p>

</div>

<br>

<div class="card">

<h2>Quiz History</h2>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>#</th>
<th>Score</th>
<th>Total</th>
<th>Date</th>
</tr>

<?php

$count = 1;

if(mysqli_num_rows($quizHistory) > 0){

while($row = mysqli_fetch_assoc($quizHistory)){

?>

<tr>

<td><?php echo $count++; ?></td>

<td><?php echo $row['score']; ?></td>

<td><?php echo $row['total']; ?></td>

<td><?php echo date("M d, Y h:i A", strtotime($row['created_at'])); ?></td>

</tr>

<?php
}

}else{

?>

<tr>

<td colspan="4" align="center">

No quiz history found.

</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

<footer>

<p>
&copy; <?php echo date("Y"); ?>
Learning Disabilities Learning System
</p>

</footer>

</body>
</html>