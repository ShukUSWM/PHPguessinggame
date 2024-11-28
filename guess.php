<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Guessing Game</title>
</head>
<body>
    <h1>Guess the Number</h1>
    <form method="post" action="">
        <label for="guess">Enter your guess (1-100): </label>
        <input type="number" name="guess" id="guess" min="1" max="100" required>
        <button type="submit">Submit Guess</button>
    </form>

    <?php

    session_start();

    if (!isset($_SESSION['randomNumber'])) {
        $_SESSION['randomNumber'] = rand(1, 100);
    }

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userGuess = intval($_POST['guess']);
        $randomNumber = $_SESSION['randomNumber'];

        if ($userGuess < $randomNumber) {
            echo "<p>Your guess is too low. Try again!</p>";
        } elseif ($userGuess > $randomNumber) {
            echo "<p>Your guess is too high. Try again!</p>";
        } else {
            echo "<p>Congratulations! You guessed the number correctly: $randomNumber</p>";
            
            unset($_SESSION['randomNumber']);
        }
    }
    ?>
</body>
</html>
