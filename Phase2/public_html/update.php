<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>Update</title>
</head>
<body>
    <?php include 'inc-dbconn.php' ?>
    <?php
    $id = "";
    $idError = "";
    $movieTitle = "";
    $movieError = "";
    $releaseDate = "";
    $releaseDateError = "";
    $duration = "";
    $durationError = "";
    $synopsis = "";
    $synopsisError = "";
    $status = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['movie_ID'])) {
            $idError = "ID is required";
        }
        else {
            $id = $_POST["movie_ID"];
        }

        if (!empty($_POST['movie_title'])) {
            $movieTitle = $_POST["movie_title"];
            $query = "update Movies
            set
                movie_title = '".$movieTitle."'
            where
                movie_ID = ".$id;
        }

        if (!empty($_POST['release_date'])) {
            $releaseDate = $_POST["release_date"];
            $query = "update Movies
            set
                release_date = '".$releaseDate."'
            where
                movie_ID = ".$id;
        }

        if (!empty($_POST['duration'])) {
            $duration = $_POST["duration"];
            $query = "update Movies
            set
                duration = '".$duration."'
            where
                movie_ID = ".$id;
        }

        if (!empty($_POST['synopsis'])) {
            $synopsis = $_POST["synopsis"];
            $query = "update Movies
            set
                synopsis = '".$synopsis."'
            where
                movie_ID = ".$id;
        }
        
        $conn->query($query);
        echo "Movie was successfully updated";
    }
    $conn = null;
    ?>

    <h2>Enter the required information</h2>
    <p><span class = "error"> * required field</span></p>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Movie ID: <input type = "text" name = "movie_ID" value = "<?php echo $id;?>">
        <span class = "error"> * <?php echo $idError;?></span>
        <br><br>
        Movie Title: <input type = "text" name = "movie_title" value = "<?php echo $movieTitle;?>">
        <br><br>
        Release Date: <input type = "date" name = "release_date" value = "<?php echo $releaseDate;?>">
        <br><br>
        Duration: <input type = "text" name = "duration" value = "<?php echo $duration;?>">
        <br><br>
        Synopsis: <input type = "text" name = "synopsis" value = "<?php echo $synopsis;?>">
        <br><br>
        <input type = "submit" name = "submit" value = "Submit">
    </form>
    <a href="http://localhost/team02/admin_home.php">
            <button onclick="document.getElementById('id01').style.display='block'">Back</button>
    </a>
</body>
</html>