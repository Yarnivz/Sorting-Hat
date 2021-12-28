<?php

    include "assets/database/dbConnection.php";

    $connection = createConnection();

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $interests = $_POST["interests"];

    $sqlInsert = "INSERT INTO `Users` (`firstname`, `lastname`, `gender`, `age`, `interests`) VALUES ('$firstname', '$lastname', '$gender', '$age', '$interests');";

    mysqli_query($connection,$sqlInsert);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person added</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Staatliches&display=swap');
    </style>
</head>
<body>
    <div class="page">

        <div class="content">

            <h1>
                Person added
            </h1>
            
            <br>
        
            <button onclick="location.href='index.html'" class="reference-buttons" id="reference-button1">
                Return to homepage
            </button>

            <br>
        
            <button onclick="location.href='createAccount.php'" class="reference-buttons" id="reference-button2">
                Add another person
            </button>

        </div>

    </div>
    
</body>
</html>