<?php include 'inc-dbconn.php' ?>
<?php $query = "
select
    Movies.movie_ID,
    movie_title,
    director_firstname,
    director_lastname,
    director_age
from 
    Movies,
    Director,
    movieDirector
where 
    movieDirector.movie_ID = Movies.movie_ID
    and movieDirector.director_ID = Director.director_ID
order by 
    Movies.movie_ID;

"?>
<?php include 'inc-show-table.php' ?>