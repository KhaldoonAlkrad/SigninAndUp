<?php

$msgErr = $usernameErr = $passwordErr = $firstnameErr = $lastnameErr = $emailErr = $firstname = $lastname = $username = $password = $email = $msgSuc = "";

function connectionDB() {
    $hostname = 'localhost';
    $databasenaam = 'phpcourse';
    $username = 'root';
    $password = '';
    $conn = new mysqli($hostname, $username, $password, $databasenaam);
    return $conn;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function insertsql($firstname, $lastname, $email, $username, $password) {
    $con = connectionDB();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        $sql = "INSERT INTO `signin`(`firstname`, `lastname`, `email`, `username`, `password`) VALUES ('$firstname','$lastname','$email','$username','$password')";
        $result = $con->query($sql);
        if (isset($result)) {
            global $msgSuc;
            $msgSuc = "Your Account Has Been Created Successfully!";
        }
    }
    $con->close();
}

function checkifexist($username, $email) {
    
    $con = connectionDB();
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } else {
        $sql = "SELECT `username`, `email` FROM `signin` WHERE `username`= '$username' OR `email`= '$email'";
        $result = $con->query($sql);
        echo $result->num_rows;
        if ($result->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["firstname"])) {
        $firstname = test_input($_POST["firstname"]);
        if ($firstname == "") {
            $firstnameErr = "firstname can not be empty <br>";
        }
    }
    if (isset($_POST["lastname"])) {
        $lastname = test_input($_POST["lastname"]);
        if ($lastname == "") {
            $lastnameErr = "lastname can not be empty";
        }
    }
    if (isset($_POST["email"])) {
        $email = test_input($_POST["email"]);
        if ($email == "") {
            $emailErr = "email can not be empty";
        }
    }
    if (isset($_POST["username"])) {
        $username = test_input($_POST["username"]);
        if ($username == "") {
            $usernameErr = "username can not be empty <br>";
        }
    }
    if (isset($_POST["password"])) {
        $password = test_input($_POST["password"]);
        if ($password == "") {
            $passwordErr = "password can not be empty";
        }
    }

    if ($username != "" && $password != "" && $firstname != "" && $lastname != "" && $email != "") {
        $ex = checkifexist($username, $email);
        if ($ex == false) {
            insertsql($firstname, $lastname, $email, $username, $password);
        } else {
            $msgErr = "the username or the email that you have enterd is al ready exist! Please choose another one";
        }
    }
}


        