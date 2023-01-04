<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>Insert</title>
</head>
<body>
    <?php include 'inc-dbconn.php' ?>
    <?php 
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
        #Movie Title
        if (empty($_POST['movie_title'])) {
            $movieError = "Title is required";
        }
        else {
            $movieTitle = $_POST["movie_title"];
        }

        #Release Date
        if (empty($_POST['release_date'])) {
            $releaseDateError = "Release Date is required";
        }
        else {
            $releaseDate = $_POST["release_date"];
        }

        #Duration
        if (empty($_POST['duration'])) {
            $durationError = "Duration is required";
        }
        else {
            $duration = $_POST["duration"];
        }

        #Synopsis
        if (empty($_POST['synopsis'])) {
            $synopsisError = "Synopsis is required";
        }
        else {
            $synopsis = $_POST["synopsis"];
        }

        $query = "insert into Movies(movie_title, release_date, duration, synopsis) values
        ('" .$movieTitle. "','" .$releaseDate. "','" .$duration. "','" .$synopsis."')";
        
        $conn->query($query);
        echo "Movie was successfully added";
    }
    $conn = null;
    ?>

    <h2>Enter the required information</h2>
    <p><span class = "error"> * required field</span></p>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Movie Title: <input type = "text" name = "movie_title" value = "<?php echo $movieTitle;?>">
        <span class = "error"> * <?php echo $movieError;?></span>
        <br><br>
        Release Date: <input type = "date" name = "release_date" value = "<?php echo $releaseDate;?>">
        <span class = "error"> * <?php echo $releaseDateError;?></span>
        <br><br>
        Duration: <input type = "text" name = "duration" value = "<?php echo $duration;?>">
        <span class = "error"> * <?php echo $durationError;?></span>
        <br><br>
        Synopsis: <input type = "text" name = "synopsis" value = "<?php echo $synopsis;?>">
        <span class = "error"> * <?php echo $synopsisError;?></span>
        <br><br>
        <input type = "submit" name = "submit" value = "Submit">
    </form>
    <a href="http://localhost/team02/admin_home.php">
            <button onclick="document.getElementById('id01').style.display='block'">Back</button>
    </a>
</body>
</html>