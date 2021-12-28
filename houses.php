<?php
    session_start();
    include "assets/database/dbConnection.php";
    $conn = createConnection();
    $sql = "SELECT * FROM `Users`";
    $users = mysqli_query($conn,$sql)->fetch_all(MYSQLI_ASSOC);
    if ($_POST["index"] != null) {
        $index = $_POST["index"];
    }
    else {
        $_SESSION["index"] = 0;
        $_SESSION["IsPressed"] = false;
    }
    if ($_SESSION["index"] >= count($users)){
        $_SESSION["index"] = 0;
        header("Location: placed.php");
    }
        
    $index = $_SESSION["index"];
    var_dump($_SESSION);
    $user = $users[$index];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Put people in houses</title>
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Righteous&family=Staatliches&display=swap');
            </style>
    </head>
    <body>


        <div class="page">

            <div class = "content">

                <h1>
                    <?php 

                        if($index < count($users)) {
                            echo $user["Firstname"];
                        } 
                        else {
                            echo "Congratulations! You've reached the end";
                        }
                    ?>
                </h1>
                <br>
                <div class="user-description">
                    

                    <p>
                        <?php                        
                            echo $user["Lastname"];
                            echo "<br>";
                        ?>
                    </p>

                    <p>

                        <?php
                            echo $user["Gender"];
                            echo "<br>";
                        ?>

                    </p>

                    <p>

                        <?php
                            echo $user["Age"];
                            echo "<br>";
                        ?>

                    </p>

                    <p>

                        <?php
                            echo $user["Interests"];                        
                        ?>

                    </p>
                </div>

                <br>

                <form method="GET" id="houses">
                    <button type="submit" class="reference-buttons" name="house" value="gryffindor" id="house-button1">
                        <?php
                            buttonDisplay($conn,$user["UserId"],"Gryffindor");
                        ?>
                    </button>

                    <button type="submit" class="reference-buttons" name="house" value="slytherin" id="house-button2">
                        <?php
                            buttonDisplay($conn,$user["UserId"],"Slytherin");
                        ?>
                    </button>
                    <br>
                    <button type="submit" class="reference-buttons" name="house" value="ravenclaw" id="house-button3">
                        <?php
                            buttonDisplay($conn,$user["UserId"],"Ravenclaw");
                        ?>
                    </button>

                    <button type="submit" class="reference-buttons" name="house" value="hufflepuff" id="house-button4">
                        <?php
                            buttonDisplay($conn,$user["UserId"],"Hufflepuff");
                        ?>
                    </button>
                </form>

            </div>

        </div>

    
    
    <?php 
        
        $house = $_GET["house"];

        if ($house == "gryffindor") {
            houseButtonClicked($conn,1);
        }
        else if ($house == "slytherin") {
            houseButtonClicked($conn,2);
        }
        else if ($house == "ravenclaw") {
            houseButtonClicked($conn,3);
        }
        else if ($house == "hufflepuff") {
            houseButtonClicked($conn,4);
        }



        function buttonDisplay($conn,$userId,$houseName) {

            if ($_SESSION["isPressed"] == false) {
                $sqlCalc = "CALL GetPercentage('$userId','$houseName',@result)";
                mysqli_query($conn,$sqlCalc);
                $sqlSelect = "SELECT @result AS result;";
                $result = mysqli_query($conn,$sqlSelect)->fetch_all(MYSQLI_ASSOC);
                $percentage = $result[0];
                if ($percentage["result"] != NULL) {
                    echo $percentage["result"] . "%";
                }
                else {
                    echo "0%";
                }
            }
            else {
                echo "This is a $houseName";
            }
        }

        function houseButtonClicked($conn,$houseId) {
            if ($_SESSION["isPressed"]) {
                $index = $_SESSION["index"];
                $sqlInsert = "INSERT INTO `Housing` (`UserId`, `HouseId`) VALUES ($index+1,$houseId);";
                mysqli_query($conn,$sqlInsert);
            }
            else {
                $_SESSION["index"] += 1;
            }

            if ($_SESSION["isPressed"]) {
                $_SESSION["isPressed"] = false;
            }
            else {
                $_SESSION["isPressed"] = true;
            }
            header("Location: houses.php");
            
        }

    ?>

</body>
</html>