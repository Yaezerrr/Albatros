<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="register.css"> <!-- Link to your existing CSS file -->
</head>

<body>
    <!-- Audio elements for sound4 and sound5 -->
    <audio id="errorSound" src="audio/sound4.mp3"></audio>
    <audio id="successSound" src="audio/sound5.mp3"></audio>

    <form action="config2.php" method="POST" id="loginForm">
        <h1>Albatross Booking</h1>
        <h2>Login</h2>


        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>

        <p style="text-align: center;">Don't have an account? <a href="http://localhost/albatross/register.php">Sign up
                here</a></p>
    </form>
    <script src="login.js"></script>
</body>

</html>