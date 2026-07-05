<?php
include 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit_quiz'])) {

    $score = 0;

    $questions = mysqli_query($conn, "SELECT * FROM quiz_questions");
    $total = mysqli_num_rows($questions);

    while ($q = mysqli_fetch_assoc($questions)) {

        $id = $q['id'];

        if (isset($_POST['answer'][$id])) {

            if ($_POST['answer'][$id] == $q['correct_answer']) {
                $score++;
            }

        }

    }

    mysqli_query($conn,
    "INSERT INTO quiz_results(user_id,score,total)
    VALUES('$user_id','$score','$total')");

    $result = "You scored <strong>$score / $total</strong>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Quiz</title>

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

<h2>Learning Disabilities Quiz</h2>

<?php
if(isset($result)){
    echo "<div class='card'>$result</div><br>";
}
?>

<form method="POST">

<?php

$questions = mysqli_query($conn,
"SELECT * FROM quiz_questions");

while($q = mysqli_fetch_assoc($questions)){

?>

<div class="card">

<h3>
<?php echo $q['question']; ?>
</h3>

<label>
<input type="radio"
name="answer[<?php echo $q['id'];?>]"
value="A" required>

<?php echo $q['option_a']; ?>

</label>

<br><br>

<label>
<input type="radio"
name="answer[<?php echo $q['id'];?>]"
value="B">

<?php echo $q['option_b']; ?>

</label>

<br><br>

<label>
<input type="radio"
name="answer[<?php echo $q['id'];?>]"
value="C">

<?php echo $q['option_c']; ?>

</label>

<br><br>

<label>
<input type="radio"
name="answer[<?php echo $q['id'];?>]"
value="D">

<?php echo $q['option_d']; ?>

</label>

</div>

<br>

<?php
}
?>

<button
type="submit"
name="submit_quiz"
class="btn">

Submit Quiz

</button>

</form>

</div>

<footer>

<p>
&copy; <?php echo date("Y"); ?>
Learning Disabilities Learning System
</p>

</footer>

</body>
</html>