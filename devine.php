<?php

session_start();

$error = false;
$text_error = "";
$result = "";

$type_number = filter_input(INPUT_POST, 'myNumber', FILTER_VALIDATE_INT);
$alea = Math.random_int(0, 100);

$_SESSION['alea'] = $alea;

if(!is_int($type_number)) {
    $error = true;
    $text_error = "Type a number please !";
}

for($i=0; $i<10; $i++) {
    if($type_number == $_SESSION['alea']) {
        $result = "Well done, it was this number !";
        $error = false;
        unset($_SESSION['alea']);
    } else if($type_number > $_SESSION['alea'] && $type_number <= 100) {
        $result = "Too big, try again !";
    } else if($type_number < $_SESSION['alea'] && $type_number >= 0) {
        $result = "Too big, try again !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess</title>
</head>
<body>
    <h1>Guess the number</h1>
    <form action="#" method="post">
        <label for="myNumber">Type a number</label>
        <input type="number" name="myNumber" id="myNumber">
        <input type="submit" value="Try">
    </form>
    <?php 
    <p name="result" id="result"><?= $result ?></p>
    <p id="error" style="display:'none';"><?= $text_error ?></p>
</body>
</html>