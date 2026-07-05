<?php
include 'config/config.php';

$message = "";

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];

            header("Location: dashboard.php");
            exit();

        } else {

            $message = "Incorrect password.";

        }

    } else {

        $message = "Email not found.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

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

<div class="container">

    <div class="form-box">

        <h2>Login</h2>

        <?php
        if($message != ""){
            echo "<p>$message</p>";
        }
        ?>

        <form method="POST">

            <label>Email</label>
            <input
                type="email"
                name="email"
                required
            >

            <label>Password</label>
            <input
                type="password"
                name="password"
                required
            >

            <button
                type="submit"
                name="login"
                class="btn">
                Login
            </button>

        </form>

        <p>
            Don't have an account?
            <a href="register.php">Register here</a>
        </p>

    </div>

</div>

<footer>
<p>&copy; <?php echo date("Y"); ?> Learning Disabilities Learning System</p>
</footer>

</body>
</html>