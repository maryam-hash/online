<html>
<link rel="stylesheet" href="styles.css">
<?php
$correctUsername = "maryam";
$correctPassword = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $imageUploaded = isset($_FILES["image"]) && $_FILES["image"]["error"] == 0;

    echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Login Result</title>";
    echo "<link rel='stylesheet' href='style.css'></head><body>";

    if ($username === $correctUsername && $password === $correctPassword) {
        echo "<div class='message-container'>";
        
        if ($imageUploaded) {
            $targetDir = "images/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

            echo "<h2>Welcome!</h2>";
            echo "<p>Here is your uploaded image:</p>";
            echo "<img src='$targetFile' alt='Uploaded Image'>";
            echo "<p>“The only limit to our realization of tomorrow is our doubts of today.”</p>";
        } else {
            echo "<h2>Welcome!</h2>";
            echo "<p>Image not uploaded.</p>";
            echo "<p>“The only limit to our realization of tomorrow is our doubts of today.”</p>";
        }
        
        echo "</div>";
    } else {
        echo "<div class='message-container'>";
        echo "<h2>Login Failed</h2>";
        echo "<p>Incorrect username or password.</p>";
        echo "</div>";
    }

    echo "</body></html>";
}
?>

</html>