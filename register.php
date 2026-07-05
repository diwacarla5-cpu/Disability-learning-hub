<?php
include 'config/config.php';

$message = "";

if (isset($_POST['register'])) {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {

        $message = "Email already exists.";

    } else {

        $sql = "INSERT INTO users(fullname,email,password)
                VALUES('$fullname','$email','$password')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration Successful!";
        } else {
            $message = "Something went wrong.";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
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

        <h2>Create Account</h2>

        <?php
        if($message!=""){
            echo "<p>$message</p>";
        }
        ?>

        <form method="POST">

            <label>Full Name</label>

            <input
                type="text"
                name="fullname"
                required
            >

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
                name="register"
                class="btn">
                Register
            </button>

        </form>

        <p>
            Already have an account?
            <a href="login.php">
                Login here
            </a>
        </p>

    </div>

</div>

<footer>
<p>&copy; <?php echo date("Y"); ?> Learning Disabilities Learning System</p>
</footer>

</body>
</html>