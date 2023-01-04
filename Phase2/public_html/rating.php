<?php include 'inc-dbconn.php' ?>
<?php $query = "
select 
    Movies.movie_ID,
    movie_title,
    rating_IMDB,
    rating_Metacritic,
    rating_Rotten_Tomatoes
from 
    Movies,
    Rating,
    movieRating
where
    movieRating.movie_ID = Movies.movie_ID
    and movieRating.rating_ID = Rating.rating_ID
order by 
    Movies.movie_ID;
"?>
<?php include 'inc-show-table.php' ?>