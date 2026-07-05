<?php
include 'config/config.php';

$lessons = mysqli_query($conn, "SELECT * FROM lessons ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Learning Lessons</title>

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

            <?php if(isset($_SESSION['user_id'])){ ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php } ?>

        </nav>

    </div>
</header>

<div class="container">

    <h2>Learning Modules</h2>

    <p>
        Choose a lesson below to learn more about learning disabilities.
    </p>

    <?php while($lesson = mysqli_fetch_assoc($lessons)){ ?>

    <div class="card">

        <?php
        if(!empty($lesson['image'])){
        ?>
            <img
                src="assets/images/<?php echo $lesson['image']; ?>"
                alt="<?php echo htmlspecialchars($lesson['title']); ?>"
                style="width:100%;max-height:250px;object-fit:cover;border-radius:10px;">
        <?php
        }
        ?>

        <h3>
            <?php echo htmlspecialchars($lesson['title']); ?>
        </h3>

        <p>
            <?php echo htmlspecialchars($lesson['description']); ?>
        </p>

        <p>
            <?php echo nl2br(substr($lesson['content'],0,250)); ?>...
        </p>

        <a
            href="lesson.php?id=<?php echo $lesson['id']; ?>"
            class="btn">
            Read More
        </a>

    </div>

    <br>

    <?php } ?>

</div>

<footer>

<p>
&copy; <?php echo date("Y"); ?>
Learning Disabilities Learning System
</p>

</footer>

</body>
</html>