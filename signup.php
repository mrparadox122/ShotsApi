<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['PhoneNumber'])&& isset($_POST['Dob'])&& isset($_POST['Gender'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("user", $_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password'],$_POST['PhoneNumber'],$_POST['Dob'],$_POST['Gender'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
