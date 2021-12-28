<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Staatliches&display=swap');
    </style>
</head>
<body>
    <div class="page">

        <div class="content">

            <h1>
                Create account
            </h1>

            <br>

            <form method="POST" action="add.php" class="registration">
                <label for="firstname">
                    Firstname
                </label>
                <br>
                <input type="text" id="firstname" name="firstname" required>
                <br>
                <br>
                <label for="lastname">
                    Lastname
                </label>
                <br>
                <input type="text" id="lastname" name="lastname" required>
                <br>
                <br>
                <label for="gender">
                    Gender
                </label>
                <br>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br>
                <br>
                <label for="age">
                    Age
                </label>
                <br>
                <input type="number" id="age" name="age" required min="0" max="140">
                <br>
                <br>
                <label for="interests">
                    Interests
                </label>
                <br>
                <input type="text" id="interests" name="interests" required>
                <br>
                <br>
                <br>
                <input type="submit" value="Create user" class="submit">
            </form>

        </div>

    </div>
</body>
</html>