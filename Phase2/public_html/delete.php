<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>Delete</title>
</head>
<body>
    <?php include 'inc-dbconn.php' ?>
    <?php 
    $id = "";
    $idError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['movie_id'])) {
            $idError = "ID number is required";
        }
        else {
            $id = $_POST["movie_id"];
        }

        #echo $localuser." ".$localpass;
        $query = "select movie_ID from Movies where movie_ID = ".$id;
       
        #echo "<br/>".$query."<br/>";
        $dbs = $conn->query($query);
        $row = $dbs->fetch(PDO::FETCH_BOTH);
        if($row[0] == $id) {
            $query = "delete from Movies where movie_ID = ".$id;
            $conn->query($query);
            echo "Movie was deleted";
        } 
        else {
            echo "<br>";
            echo "Movie does not exist";
        }
    }
    $conn = null;
    ?>

    <h2>Enter the ID of the movie you would like to delete</h2>
    <p><span class = "error"> * required field</span></p>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Movie ID: <input type = "text" name = "movie_id" value = "<?php echo $id;?>">
        <span class = "error"> * <?php echo $idError;?></span>
        <br><br>
        <input type = "submit" name = "submit" value = "Submit">
    </form>
    <a href="http://localhost/team02/admin_home.php">
            <button onclick="document.getElementById('id01').style.display='block'">Back</button>
    </a>
</body>
</html>