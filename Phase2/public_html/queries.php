<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <title>Queries</title>
</head>
<body>
    <?php include 'inc-dbconn.php' ?>
    <?php 
    $idNumber = "";
    $idError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        #Movie Title
        if($_SERVER["REQUEST_METHOD"] == "back") {
            header("Location: index.php");
        }
        if (empty($_POST['query_number'])) {
            $idError = "Number is required";
        }
        else {
            $idNumber = $_POST["query_number"];
        }

        if ($_POST['query_number'] == 1) {
            $query = "
                    select 
                        movie_title 
                    from
                        Movies,
                        movieDirector
                    where
                        movieDirector.director_ID = 1
                        and movieDirector.movie_ID = Movies.movie_ID;";
        }

        if ($_POST['query_number'] == 2) {
            $query = "
        select 
            movie_title
        from
            Movies,
            movieGenre
        where
            movieGenre.genre_ID = 5
            and movieGenre.movie_ID = Movies.movie_ID;";
        }

        if ($_POST['query_number'] == 3) {
            $query = "
        select
            movie_title,
            rating_IMDB
        from
            Movies,
            Rating
        where
            rating_IMDB >= 8
            and movie_ID = rating_ID;";
        }

        if ($_POST['query_number'] == 4) {
            $query = "
            SELECT 
                movie_title 
            FROM 
                Movies 
            WHERE 
                movie_title REGEXP '^[A]' 
            order by 
                movie_title;";
        }

        if ($_POST['query_number'] == 5) {
            $query = "
            select 
                movie_title 
            from 
                Movies 
            where 
                duration >= 180;";
        }

        if ($_POST['query_number'] == 6) {
            $query = "
            select
                movie_title
            from
                Movies,
                movieAwards
            where
                movieAwards.award_ID = 12
                and Movies.movie_ID = movieAwards.movie_ID;";
        }

        if ($_POST['query_number'] == 7) {
            $query = "
            select 
                concat(actor_firstname,' ', actor_lastname) as Name
            from 
                Actor 
            where 
                actor_net_worth >= 100 
            order by
                Name";
        }

        if ($_POST['query_number'] == 8) {
            $query = "
            with cte as (
                select 
                    actor_ID, count(*) as numMovies 
                FROM 
                    movieActor
                GROUP BY 
                    actor_ID
                HAVING 
                    numMovies > 5
                ) 
                SELECT 
                    concat(actor_firstname,' ', actor_lastname) as Name
                from 
                    Actor, 
                    cte
                where 
                    Actor.actor_ID = cte.actor_ID
                ORDER BY
                    Name;";
        }

        if ($_POST['query_number'] == 9) {
            $query = "
            with rating_cte as (
                select 
                    *
                from 
                    Rating
                where 
                    rating_Metacritic is null
                ),
            movie_cte as (
                select 
                    movie_ID
                from 
                    movieRating, 
                    rating_cte
                where 
                    movieRating.rating_ID = rating_cte.rating_ID
                )
            select 
                movie_title 
            from 
                Movies, 
                movie_cte 
            where 
                Movies.movie_ID = movie_cte.movie_ID;";
        }

        if ($_POST['query_number'] == 10) {
            $query = "
            with genre_cte as (
                select 
                    genre_ID 
                from 
                    Genre 
                where 
                    genre_title = 'Fantasy'
                ),
            movie_cte as (
                    select 
                        movie_ID 
                    from 
                        movieGenre, 
                        genre_cte 
                    where 
                        movieGenre.genre_ID = genre_cte.genre_ID
                ),
            rating_cte as (
                select 
                    * 
                from 
                    Rating, 
                    movie_cte 
                where 
                    rating_ID = movie_cte.movie_ID
                )
                select 
                    movie_title, 
                    rating_IMDB, 
                    rating_Rotten_Tomatoes, 
                    rating_Metacritic 
                from 
                    Movies, 
                    rating_cte 
                where 
                    Movies.movie_ID = rating_cte.rating_ID 
                order by 
                    movie_title;";
        }

        try {
            $dbs = $conn->query($query);
            while ( $row = $dbs->fetch(PDO::FETCH_BOTH) ) {
                echo "<tr>";
                echo "<br>";
                $cnt = count($row) / 2;
                for ($i = 0; $i < $cnt; $i++) {
                    echo "<td> " . $row[$i] . "<br>"." </td>";
                }
                echo "</tr>";
            }
        }
        catch (Exception $e) {
            echo "<tr><td>Exception Message: <br>/>" .$e->getMessage() .'</td></tr>';
        }

    }
    $conn = null;
    ?>

    <h2>Enter The Query You Would Like To View</h2>
    <p><span class = "error"> * required field</span></p>
    <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Query Number: <input type = "text" name = "query_number" value = "<?php echo $idNumber;?>">
        <span class = "error"> * <?php echo $idError;?></span>
        <br><br>
        <input type = "submit" name = "submit" value = "Submit">
    </form>
    <a href="http://localhost/team02">
            <button onclick="document.getElementById('id01').style.display='block'">Back</button>
    </a>

    <?php
        echo "<br>1. Find the title of all movies directed by George Lucas <br>";
        echo "2. Find the title of all movies in the horror genre <br>";
        echo "3. Find all movies that have received an IMDB rating of 8 or above <br>";
        echo "4. Find the movie title of all movies that start with the letter A <br>";
        echo "5. Find the movie title of all movies that are longer than 180 mins <br>";
        echo "6. Find the movie title of all movies that won Best Original Score <br>";
        echo "7. Find all actors who have a net worth of $100 million or more <br>";
        echo "8. Find all actors who have been in 5 or more movies <br>";
        echo "9. Find all movies that do not have a rating from Metacritic <br>";
        echo "10. Find the all movies under the Fantasy genre along with their ratings <br>";
    ?>
</body>
</html>