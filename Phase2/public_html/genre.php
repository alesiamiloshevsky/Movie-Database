<?php include 'inc-dbconn.php' ?>
<?php $query = "
select 
    Movies.movie_ID,
    movie_title, 
    genre_title 
from 
    Movies, 
    Genre, 
    movieGenre 
where 
    movieGenre.movie_ID = Movies.movie_ID 
    and movieGenre.genre_ID = Genre.genre_ID;
order by 
    Movies.movie_ID;
"?>
<?php include 'inc-show-table.php' ?>