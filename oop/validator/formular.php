<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("./Validator.php");
$validation = new Validator();

if (isset($_POST["submit"])) {
    /* Ge datat till maskinen */
    $validation->set($_POST);
    /* Be maskinen att kontrollera och svara med felen som upptäcks */
    $validation->validateForm();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form validator</title>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h2>Create a new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <div class="errors">
                <?php $validation->showErrors("username");  ?>
            </div>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <div class="errors">
                <?php $validation->showErrors("pasword");  ?>
            </div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <div class="errors">
                <?php $validation->showErrors("email");  ?>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
</body>
</html>