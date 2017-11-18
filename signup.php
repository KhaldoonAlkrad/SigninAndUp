<?php require 'handelingsignup.php'; ?>
<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Making Signin Form in PHP" />
        <meta name="keywords" content="Form,Signin,PHP" />
        <meta name="author" content="Khaldoon Al Krad" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PHP Course Sign Up Form</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="mystyle.css" />

    </head>

    <body >
        <header>ITPH Academy</header>
        <nav>
            <div class="topnav" id="myTopnav">
                <a href="index.php" class="active">Home</a>
                <a href="#Teachers"> Teachers </a>
                <a href="#students">Students </a>
                <a href="#schools">Schools</a>
                <a id="signup" href="signup.php">Sign Up</a>
            </div>
        </nav>

    <content>

        <div>
            <form method = "POST" action = "signup.php" autocomplete = "on">
                <fieldset>
                    <legend>Sign Up </legend> 
                    <input type="text" name="firstname" placeholder="First Name" value="" >
                    <span class="error"><?php echo $firstnameErr; ?></span>
                    <input type="text" name="lastname" placeholder="Last Name" value="" >
                    <span class="error"><?php echo $lastnameErr; ?></span>
                    <input type="text" name="email" placeholder="Email" value="" > 
                    <span class="error"><?php echo $emailErr; ?></span>
                </fieldset>
                <fieldset>
                    <input type="text" name="username" placeholder="Username" value="" >
                    <span class="error"><?php echo $usernameErr; ?></span>
                    <input type="text" name="password" placeholder="Password" value="" > 
                    <span class="error"><?php echo $passwordErr; ?></span>
                    <span class="error"><?php echo $msgErr; ?></span> 
                    <span class="success"><?php echo $msgSuc; ?></span> 
                </fieldset>     
                <input type="submit" name="signup" value="Sign Up">  

            </form>

        </div>
    </content>

    <footer>All Rights Reserved To Khaldoon Al Krad &reg; <?php echo date('Y') ?> </footer>

</body>

</html>

