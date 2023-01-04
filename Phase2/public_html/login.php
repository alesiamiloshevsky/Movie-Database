<!DOCTYPE html>
<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>LOGIN</title>
</head>
<body>
    <?php include 'inc-dbconn.php' ?>
    <?php 
    echo "Admin username = admin <br>";
    echo "Admin password = password";
    $localuser = $localpass = "";
    $nameError = $passwordError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['Username'])) {
            $nameError = "Name is required";
        }
        else {
            $localuser = $_POST["Username"];
        }

        if (empty($_POST['Password'])) {
            $passwordError = "Password is required";
        }
        else {
            $localpass = $_POST["Password"];
        }

        $query = "select user_role from users ".
        "where user_username = '".$localuser."'".
        " and user_password = '".$localpass."'";

        try{
            $dbs = $conn->query($query);
            $row = $dbs->fetch(PDO::FETCH_BOTH);

            if (empty($row)) {
                $passwordError = "Bad Password";
            }
            else {
                $_SESSION["localuser"] = $localuser;
                $_SESSION["localrole"] = $row["user_role"];
            }

            if ($row["user_role"] == "admin") {
                header("Location: admin_home.php");
            }
            else {
                header("Location: user_home.php");
            }
        }
        catch (Exception $e) {
            echo "<tr><td>Exception Message:<br/>".$e.getMessage().'</td></tr>';
        }
        
    }
    $conn = null;
    ?>

    <h2>Enter Username and Password</h2>
    <p><span class = "error"> * required field</span></p>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type = "text" name = "Username" value = "<?php echo $localuser;?>">
        <span class = "error"> * <?php echo $nameError;?></span>
        <br><br>
        Password: <input type = "password" name = "Password" value = "<?php echo $localpass;?>">
        <span class = "error"> * <?php echo $passwordError;?></span>
        <input type = "submit" name = "submit" value = "submit">
    </form>
    <a href="http://localhost/team02">
            <button onclick="document.getElementById('id01').style.display='block'">Back</button>
    </a>
</body>
</html>